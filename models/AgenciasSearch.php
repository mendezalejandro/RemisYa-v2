<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Agencias;

/**
 * AgenciasSearch represents the model behind the search form about `app\models\Agencias`.
 */
class AgenciasSearch extends Agencias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AgenciaID', 'Estado'], 'integer'],
            [['Nombre', 'Telefono', 'Email', 'CUIT'], 'safe'],
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
        $query = Agencias::find();

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
            'AgenciaID' => $this->AgenciaID,
            'Estado' => $this->Estado,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'CUIT', $this->CUIT]);

        return $dataProvider;
    }
}
