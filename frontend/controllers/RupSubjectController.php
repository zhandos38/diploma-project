<?php

namespace frontend\controllers;

use common\models\Component;
use common\models\ComponentItem;
use Yii;
use common\models\RupSubject;
use frontend\models\RupSubjectSearch;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RupSubjectController implements the CRUD actions for RupSubject model.
 */
class RupSubjectController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['user']
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all RupSubject models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RupSubjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $rup);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RupSubject model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RupSubject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws Exception
     */
    public function actionCreate($rup)
    {
        $model = new RupSubject();
        $model->rup_id = $rup;
        $model->amount_lab = 0;
        $model->amount_practice = 0;
        $model->amount_extra = 0;
        $model->amount_srop = 0;
        $model->amount_lecture = 0;

        if ($model->load(Yii::$app->request->post())) {
            $flag = false;

            // checking for duplicate
            if (!$model->subject->is_repeat && RupSubject::findOne(['rup_id' => $model->rup_id, 'subject_id' => $model->subject_id])) {
                Yii::$app->session->setFlash('error', 'Данный предмет уже добавлен');
                $flag = true;
            }

            $model->code = $this->generateSubjectCode($model);

            $textNumber = $this->creditCheck($model);

            if ($flag || $textNumber) {
                if ($textNumber) {
                    Yii::$app->session->setFlash('error', "Всего часов должно быть {$textNumber}");
                }

                return $this->render('create', [
                    'model' => $model,
                ]);
            }


            if (!$model->save()) {
                throw new Exception('Rup subject is not saved');
            }

            return $this->redirect(['rup/update', 'id' => $model->rup_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RupSubject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $textNumber = $this->creditCheck($model);

            if ($textNumber) {
                Yii::$app->session->setFlash('error', "Всего часов должно быть {$textNumber}");

                return $this->render('update', [
                    'model' => $model,
                ]);
            }


            if (!$model->save()) {
                throw new Exception('Rup subject is not saved');
            }

            return $this->redirect(['rup/update', 'id' => $model->rup_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RupSubject model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['rup/update', 'id' => $model->rup_id]);
    }

    /**
     * @param $model RupSubject
     * @return string
     */
    public function actionGetSubjectCode()
    {
        $data = Yii::$app->request->get();
        $rup_id = $data['rup_id'];
        $component_item_id = $data['component_item_id'];
        $module_module_id = $data['module_item_id'];
        $semester = $data['semester'];

        $moduleNumber = RupSubject::find()->where(['rup_id' => $rup_id, 'module_item_id' => $module_module_id])->count();
        $componentNumber = RupSubject::find()->where(['rup_id' => $rup_id, 'component_item_id' => $component_item_id])->count();

        return $semester . ++$moduleNumber . sprintf("%02d", ++$componentNumber);
    }

    public function creditCheck($model) {
        $hours = $model->amount_lecture + $model->amount_practice + $model->amount_lab + $model->amount_extra + $model->amount_srop;
        $credits = round(($model->amount_lecture + $model->amount_practice + $model->amount_lab + $model->amount_extra + $model->amount_srop)/30);

        $textNumber = null;
        if ($credits === 3.0 && ($hours !== 90)) {
            $textNumber = 90;
        }
        if ($credits === 4.0 && ($hours !== 120)) {
            $textNumber = 120;
        }
        if ($credits === 5.0 && ($hours !== 150)) {
            $textNumber = 150;
        }
        if ($credits === 6.0 && ($hours > 180 || $hours < 180)) {
            $textNumber = 180;
        }
        if ($credits === 7.0 && ($hours > 210 || $hours < 210)) {
            $textNumber = 210;
        }
        if ($credits === 8.0 && ($hours > 240 || $hours < 240)) {
            $textNumber = 240;
        }
        if ($credits === 9.0 && ($hours > 270 || $hours < 270)) {
            $textNumber = 270;
        }
        if ($credits === 10.0 && ($hours > 300 || $hours < 300)) {
            $textNumber = 300;
        }

        return $textNumber;
    }

    /**
     * Finds the RupSubject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RupSubject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RupSubject::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
