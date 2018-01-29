<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Viajes;

/**
 * SearchViajes represents the model behind the search form about `app\models\Viajes`.
 */
class SearchViajes extends Viajes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ViajeID', 'ChoferID', 'VehiculoID', 'TarifaID', 'TurnoID', 'AgenciaID', 'PersonaID', 'ViajeTipo', 'Estado'], 'integer'],
            [['FechaEmision', 'FechaSalida', 'OrigenCoordenadas', 'DestinoCoordenadas', 'OrigenDireccion', 'DestinoDireccion', 'Comentario'], 'safe'],
            [['ImporteTotal', 'Distancia'], 'number'],
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
        $query = Viajes::find();
        $query->joinWith(['vehiculo']);
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
            'ViajeID' => $this->ViajeID,
            'ChoferID' => $this->ChoferID,
            'VehiculoID' => $this->VehiculoID,
            'TarifaID' => $this->TarifaID,
            'TurnoID' => $this->TurnoID,
            'AgenciaID' => $this->AgenciaID,
            'PersonaID' => $this->PersonaID,
            'FechaEmision' => $this->FechaEmision,
            'FechaSalida' => $this->FechaSalida,
            'ViajeTipo' => $this->ViajeTipo,
            'ImporteTotal' => $this->ImporteTotal,
            'Distancia' => $this->Distancia,
            'Estado' => $this->Estado,
        ]);

        $query->andFilterWhere(['like', 'OrigenCoordenadas', $this->OrigenCoordenadas])
            ->andFilterWhere(['like', 'DestinoCoordenadas', $this->DestinoCoordenadas])
            ->andFilterWhere(['like', 'OrigenDireccion', $this->OrigenDireccion])
            ->andFilterWhere(['like', 'DestinoDireccion', $this->DestinoDireccion])
            ->andFilterWhere(['like', 'Comentario', $this->Comentario])
            ->andFilterWhere(['like', 'vehiculo.Marca', $this->VehiculoID]);

        return $dataProvider;
    }
}
