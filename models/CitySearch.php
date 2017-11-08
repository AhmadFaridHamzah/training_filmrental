<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\City;

/**
 * CitySearch represents the model behind the search form about `app\models\City`.
 */
class CitySearch extends City
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id', 'country_id'], 'integer'],
            [['city', 'last_update', 'country.country'], 'safe'],
        ];
    }

    public function attributes(){
        return array_merge(parent::attributes(), ['country.country']);
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
        $query = City::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query->joinWith(['country']),
        ]);

        //untuk custom sorting
        $addSortAttributes = ['country.country'];
        foreach($addSortAttributes as $addSortAttribute){
            $dataProvider->sort->attributes[$addSortAttribute] = [
                'asc' => [$addSortAttribute => SORT_ASC],
                'desc' => [$addSortAttribute => SORT_DESC],
            ];
        }

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'city_id' => $this->city_id,
            'country.country_id' => $this->country_id,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city]);
        $query->andFilterWhere(['like', 'country.country', $this->getAttribute('country.country')]);

        return $dataProvider;
    }
}
