<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RupSubject;
use yii\helpers\VarDumper;

/**
 * RupSubjectSearch represents the model behind the search form of `common\models\RupSubject`.
 */
class RupSubjectSearch extends RupSubject
{
    public $component_id;
    public $component_item_id;
    public $module_id;
    public $module_item_id;
    public $code;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rup_id', 'subject_id', 'language', 'semester', 'amount_lecture', 'amount_practice', 'amount_lab', 'is_course_work', 'is_gos', 'is_exam'], 'integer'],

            ['code', 'string', 'max' => 255],
            [['component_id', 'component_item_id', 'module_id', 'module_item_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $rup_id)
    {
        $query = RupSubject::find()
                ->alias('t1')
                ->joinWith('subject as t2')
                ->leftJoin('module_item as t3' , ['t3.id' => 't2.module_item_id'])
                ->leftJoin('component_item as t4' , ['t4.id' => 't2.component_item_id'])
                ->where(['t1.rup_id' => $rup_id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            't1.id' => $this->id,
            't1.rup_id' => $this->rup_id,
            't1.subject_id' => $this->subject_id,
            't1.lang' => $this->lang,
            't1.semester' => $this->semester,
            't1.amount_lecture' => $this->amount_lecture,
            't1.amount_practice' => $this->amount_practice,
            't1.amount_lab' => $this->amount_lab,
            't1.is_course_work' => $this->is_course_work,
            't1.is_gos' => $this->is_gos,
            't1.is_exam' => $this->is_exam,

            't2.module_item_id' => $this->module_item_id,
            't2.component_item_id' => $this->component_item_id,

            't3.module_id' => $this->module_id,
            't4.component_id' => $this->component_id,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
