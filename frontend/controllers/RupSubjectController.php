<?php

namespace frontend\controllers;

use common\models\Component;
use common\models\ComponentItem;
use Yii;
use common\models\RupSubject;
use frontend\models\RupSubjectSearch;
use yii\db\Exception;
use yii\filters\AccessControl;
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

        if ($model->load(Yii::$app->request->post())) {
            if (RupSubject::findOne(['subject_id' => $model->subject_id])) {
                Yii::$app->session->setFlash('error', 'Данный предмет уже добавлен');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

            $model->code = $this->generateSubjectCode($model);

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

//            $model->code = $this->generateSubjectCode($model);

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

        return $this->redirect(['rup/update', 'id' => $model->id]);
    }

    public function generateSubjectCode($model) {
        $count = 0;
        $components = Component::find()->andWhere(['user_id' => Yii::$app->user->getId()])->all();
        foreach ($components as $component) {
            $count++;
            if ($component->id === $model->subject->componentItem->component_id) {
                break;
            }
        }

        $componentNumber = RupSubject::find()->alias('t1')->leftJoin('subject t2', 't2.id = t1.subject_id')->where(['t2.component_item_id' => $model->subject->component_item_id])->count();
//        VarDumper::dump($componentNumber,10,1); die;

        $words = preg_split("/[\s,_-]+/", $model->subject->name);
        $acronym = "";

        foreach ($words as $w) {
            $acronym .= mb_substr($w, 0, 1);
        }

        return $acronym  . ' ' . $model->getSemester() . $count . sprintf("%02d", ++$componentNumber);
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
