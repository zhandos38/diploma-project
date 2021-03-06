<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Rup;

/**
 * RupSearch represents the model behind the search form of `common\models\Rup`.
 */
class RupSearch extends Rup
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'specialty_id', 'degree', 'year', 'mode', 'lang'], 'integer'],
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
        $query = Rup::find()
            ->where(['user_id' => \Yii::$app->user->getId()]);

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
            'specialty_id' => $this->specialty_id,
            'degree' => $this->degree,
            'year' => $this->year,
            'mode' => $this->mode
        ]);

        $query->andFilterWhere(['like', 'lang', $this->lang]);

        return $dataProvider;
    }
}
