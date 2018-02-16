<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Viajes;

/**
 * SearchViajes represents the model behind the search form about `app\models\Viajes`.
 */
class SearchReservas extends Viajes
{
    public $nombreCompleto;
    const Reservado = 1;
    const Web = 0;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ViajeID', 'ChoferID', 'TarifaID', 'TurnoID', 'AgenciaID',  'ViajeTipo', 'Estado'], 'integer'],
            [['nombreCompleto', 'FechaEmision', 'VehiculoID','UsuarioID','FechaSalida', 'OrigenCoordenadas', 'DestinoCoordenadas', 'OrigenDireccion', 'DestinoDireccion', 'Comentario'], 'safe'],
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
        $query->joinWith(['usuario']);
        //$query->join('LEFT OUTER JOIN', 'personas', 'personas.PersonaID=Viajes.PersonaID');

        /*$dataProvider->setSort([
            'attributes' => [
                'nombreCompleto' => [
                    'asc' => ['personas.Nombre' => SORT_ASC, 'personas.Apellido' => SORT_ASC],
                    'desc' => ['personas.Nombre' => SORT_DESC, 'personas.Apellido' => SORT_DESC],
                    'label' => 'Full Name',
                    'default' => SORT_ASC
                ],
            ]
        ]);*/
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ViajeID' => $this->ViajeID,
            'Viajes.VehiculoID' => $this->VehiculoID,
            'ChoferID' => $this->ChoferID,
            'TarifaID' => $this->TarifaID,
            'TurnoID' => $this->TurnoID,
            'Viajes.AgenciaID' => Yii::$app->user->identity->agencia,
            'FechaEmision' => $this->FechaEmision,
            'FechaSalida' => $this->FechaSalida,
            'ImporteTotal' => $this->ImporteTotal,
            'Distancia' => $this->Distancia,
            'Viajes.Estado' => self::Reservado, //Le pongo Viajes.Estado porque la columna es ambigua con el inner join a vehiculos.
        ]);

        $query->andFilterWhere(['like', 'OrigenCoordenadas', $this->OrigenCoordenadas])
            ->andFilterWhere(['like', 'DestinoCoordenadas', $this->DestinoCoordenadas])
            ->andFilterWhere(['like', 'OrigenDireccion', $this->OrigenDireccion])
            ->andFilterWhere(['like', 'DestinoDireccion', $this->DestinoDireccion])
            ->andFilterWhere(['like', 'Comentario', $this->Comentario])
            ->andFilterWhere(['<>', 'ViajeTipo', self::Web]);
            //->andFilterWhere(['like', 'Vehiculos.Marca', $this->VehiculoID])

            if($this->nombreCompleto != "")
            {
                $query->andWhere('(Usuarios.Nombre LIKE "%' . $this->nombreCompleto . '%" ' .'OR Usuarios.Apellido LIKE "%' . $this->nombreCompleto . '%")');
            }
            $query->orderBy(['Viajes.FechaEmision'=>SORT_DESC]);
        return $dataProvider;
    }
}
