<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rides;
use yii\db\Expression;
use Yii;
/**
 * RidesSearch represents the model behind the search form of `app\models\Rides`.
 */
class RidesSearch extends Rides
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'CITY_FROM_ID', 'CITY_TO_ID', 'DRIVER_ID'], 'integer'],
            [['DATE'], 'safe'],
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
       // $query = Rides::find();
        $query = Rides::find()->where(['>','DATE', new Expression('NOW()')]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // grid filtering conditions
        if(!empty($this->DATE)){
            $this->DATE = date("Y-m-d", strtotime($this->DATE));
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'CITY_FROM_ID' => $this->CITY_FROM_ID,
            'CITY_TO_ID' => $this->CITY_TO_ID,
            'DRIVER_ID' => $this->DRIVER_ID,
            'date(DATE)' => $this->DATE,
        ]);

        return $dataProvider;
    }

    public function searchUserRides($params = null)
    {
        $query = Rides::find()->where(
            ['DRIVER_ID' => Yii::$app->user->getId()])
            ->andWhere(['>','DATE', new Expression('NOW()')]
            );

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'CITY_FROM_ID' => $this->CITY_FROM_ID,
            'CITY_TO_ID' => $this->CITY_TO_ID,
            'DRIVER_ID' => $this->DRIVER_ID,
            'date(DATE)' => $this->DATE,
        ]);

        return $dataProvider;
    }
}
