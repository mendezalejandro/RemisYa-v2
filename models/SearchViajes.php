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
            [['ViajeID', 'ChoferID', 'TarifaID', 'TurnoID', 'AgenciaID',  'ViajeTipo', 'Estado'], 'integer'],
            [['FechaEmision', 'VehiculoID','PersonaID','FechaSalida', 'OrigenCoordenadas', 'DestinoCoordenadas', 'OrigenDireccion', 'DestinoDireccion', 'Comentario'], 'safe'],
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
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->joinWith(['vehiculo']);
        $query->joinWith(['persona']);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ViajeID' => $this->ViajeID,
            'ChoferID' => $this->ChoferID,
            'TarifaID' => $this->TarifaID,
            'TurnoID' => $this->TurnoID,
            'AgenciaID' => $this->AgenciaID,
            'FechaEmision' => $this->FechaEmision,
            'FechaSalida' => $this->FechaSalida,
            'ViajeTipo' => $this->ViajeTipo,
            'ImporteTotal' => $this->ImporteTotal,
            'Distancia' => $this->Distancia,
            'Viajes.Estado' => $this->Estado, //Le pongo Viajes.Estado porque la columna es ambigua con el inner join a vehiculos.
        ]);

        $query->andFilterWhere(['like', 'OrigenCoordenadas', $this->OrigenCoordenadas])
            ->andFilterWhere(['like', 'DestinoCoordenadas', $this->DestinoCoordenadas])
            ->andFilterWhere(['like', 'OrigenDireccion', $this->OrigenDireccion])
            ->andFilterWhere(['like', 'DestinoDireccion', $this->DestinoDireccion])
            ->andFilterWhere(['like', 'Comentario', $this->Comentario])
            ->andFilterWhere(['like', 'Vehiculos.Marca', $this->VehiculoID])
            //->andFilterWhere(['like', 'Personas.Nombre', $this->PersonaID])
            ->andFilterWhere(['like', 'Personas.Apellido', $this->PersonaID]);

        return $dataProvider;
    }
}
