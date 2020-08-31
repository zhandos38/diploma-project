<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Subject;

/**
 * SubjectSearch represents the model behind the search form of `common\models\Subject`.
 */
class SubjectSearch extends Subject
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'component_id', 'subject_type_id', 'module_id', 'is_practice'], 'integer'],
            [['code', 'language', 'name'], 'safe'],
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
        $query = Subject::find();

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
            'component_id' => $this->component_id,
            'subject_type_id' => $this->subject_type_id,
            'module_id' => $this->module_id,
            'is_practice' => $this->is_practice,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
