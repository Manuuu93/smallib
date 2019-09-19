<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Quote;

/**
 * QuoteSearch represents the model behind the search form of `common\models\Quote`.
 */
class QuoteSearch extends Quote
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'book_id', 'user_id'], 'integer'],
            [['content'], 'safe'],
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
        $query = Quote::find();

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
            'book_id' => $this->book_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);
        $query->with('book', 'user');

        return $dataProvider;
    }
}
