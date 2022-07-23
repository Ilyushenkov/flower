<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Article;

/**
 * ArticleSearh represents the model behind the search form of `app\models\Article`.
 */
class ArticleSearh extends Article
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'count', 'category_id'], 'integer'],
            [['photo', 'name', 'country', 'color', 'date'], 'safe'],
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
        $query = Article::find();

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
            'price' => $this->price,
            'count' => $this->count,
            'category_id' => $this->category_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'color', $this->color]);

        return $dataProvider;
    }
}
