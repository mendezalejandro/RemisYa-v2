<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\vehiculos;

/**
 * SearchVehiculos represents the model behind the search form about `app\models\vehiculos`.
 */
class SearchVehiculos extends vehiculos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VehiculoID', 'AgenciaID'], 'integer'],
            [['Matricula', 'Modelo', 'Marca', 'Estado', 'FechaAlta', 'FechaBaja'], 'safe'],
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
        $query = vehiculos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'VehiculoID' => $this->VehiculoID,
            'AgenciaID' => $this->AgenciaID,
            'FechaAlta' => $this->FechaAlta,
            'FechaBaja' => $this->FechaBaja,
        ]);

        $query->andFilterWhere(['like', 'Matricula', $this->Matricula])
            ->andFilterWhere(['like', 'Modelo', $this->Modelo])
            ->andFilterWhere(['like', 'Marca', $this->Marca])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
