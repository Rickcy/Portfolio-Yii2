<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Skills;

/**
 * SkillsSearch represents the model behind the search form about `app\models\Skills`.
 */
class SkillsSearch extends Skills
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'skill_percent'], 'integer'],
            [['skill_name'], 'safe'],
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
        $query = Skills::find();

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
            'skill_percent' => $this->skill_percent,
        ]);

        $query->andFilterWhere(['like', 'skill_name', $this->skill_name]);

        return $dataProvider;
    }
}
