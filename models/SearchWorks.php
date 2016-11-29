<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Works;

/**
 * SearchWorks represents the model behind the search form about `app\models\Works`.
 */
class SearchWorks extends Works
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'showMain'], 'integer'],
            [['work_name', 'work_description', 'worl_url', 'work_tech', 'work_image', 'work_name_image'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Works::find();

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
            'showMain' => $this->showMain,
        ]);

        $query->andFilterWhere(['like', 'work_name', $this->work_name])
            ->andFilterWhere(['like', 'work_description', $this->work_description])
            ->andFilterWhere(['like', 'worl_url', $this->worl_url])
            ->andFilterWhere(['like', 'work_tech', $this->work_tech])
            ->andFilterWhere(['like', 'work_image', $this->work_image])
            ->andFilterWhere(['like', 'work_name_image', $this->work_name_image]);

        return $dataProvider;
    }
}
