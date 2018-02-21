<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Zadania;

/**
 * ZadaniaSearch represents the model behind the search form of `app\models\Zadania`.
 */
class ZadaniaSearch extends Zadania
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'typ'], 'integer'],
            [['opis', 'stan', 'dataod', 'datado', 'godzinaod', 'godzinado'], 'safe'],
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
        $query = Zadania::find();

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
            'typ' => $this->typ,
            'dataod' => $this->dataod,
            'datado' => $this->datado,
            'godzinaod' => $this->godzinaod,
            'godzinado' => $this->godzinado,
        ]);

        $query->andFilterWhere(['like', 'opis', $this->opis])
            ->andFilterWhere(['like', 'stan', $this->stan]);

        return $dataProvider;
    }
}
