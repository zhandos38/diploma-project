<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RupSubject;

/**
 * RupSubjectSearch represents the model behind the search form of `common\models\RupSubject`.
 */
class RupSubjectSearch extends RupSubject
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rup_id', 'subject_id', 'semester', 'amount_lecture', 'amount_practice', 'amount_lab', 'is_course_work', 'is_gos', 'is_exam'], 'integer'],
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
    public function search($params)
    {
        $query = RupSubject::find();

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
            'id' => $this->id,
            'rup_id' => $this->rup_id,
            'subject_id' => $this->subject_id,
            'semester' => $this->semester,
            'amount_lecture' => $this->amount_lecture,
            'amount_practice' => $this->amount_practice,
            'amount_lab' => $this->amount_lab,
            'is_course_work' => $this->is_course_work,
            'is_gos' => $this->is_gos,
            'is_exam' => $this->is_exam,
        ]);

        return $dataProvider;
    }
}
