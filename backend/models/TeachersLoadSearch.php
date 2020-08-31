<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TeachersLoad;

/**
 * TeachersLoadSearch represents the model behind the search form of `common\models\TeachersLoad`.
 */
class TeachersLoadSearch extends TeachersLoad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'group_id', 'teacher_id', 'rup_subject_id', 'practice', 'course_work', 'year', 'tutor_connection', 'diploma_leader', 'amount_lecture', 'amount_practice', 'amount_lab'], 'integer'],
            [['exam', 'block'], 'number'],
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
        $query = TeachersLoad::find();

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
            'group_id' => $this->group_id,
            'teacher_id' => $this->teacher_id,
            'rup_subject_id' => $this->rup_subject_id,
            'practice' => $this->practice,
            'course_work' => $this->course_work,
            'exam' => $this->exam,
            'block' => $this->block,
            'year' => $this->year,
            'tutor_connection' => $this->tutor_connection,
            'diploma_leader' => $this->diploma_leader,
            'amount_lecture' => $this->amount_lecture,
            'amount_practice' => $this->amount_practice,
            'amount_lab' => $this->amount_lab,
        ]);

        return $dataProvider;
    }
}
