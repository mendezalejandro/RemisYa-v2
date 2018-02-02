<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tarifas;

/**
 * SearchTarifas represents the model behind the search form about `app\models\tarifas`.
 */
class SearchTarifas extends tarifas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TarifaID', 'AgenciaID', 'Estado'], 'integer'],
            [['Comision', 'ViajeMinimo', 'KmMinimo', 'PrecioKM'], 'number'],
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
        $query = tarifas::find();

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
            'TarifaID' => $this->TarifaID,
            'Comision' => $this->Comision,
            'AgenciaID' => $this->AgenciaID,
            'ViajeMinimo' => $this->ViajeMinimo,
            'KmMinimo' => $this->KmMinimo,
            'PrecioKM' => $this->PrecioKM,
            'Estado' => $this->Estado,
        ]);

        return $dataProvider;
    }
}
