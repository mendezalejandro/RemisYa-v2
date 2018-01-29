<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Calificaciones;

/**
 * SearchCalificaciones represents the model behind the search form about `app\models\Calificaciones`.
 */
class SearchCalificaciones extends Calificaciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CalificacionID', 'ViajeID', 'Quien', 'ParaQuien', 'Puntaje', 'AgenciaID'], 'integer'],
            [['Fecha', 'Comentario'], 'safe'],
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
        $query = Calificaciones::find();

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
            'CalificacionID' => $this->CalificacionID,
            'ViajeID' => $this->ViajeID,
            'Quien' => $this->Quien,
            'ParaQuien' => $this->ParaQuien,
            'Puntaje' => $this->Puntaje,
            'Fecha' => $this->Fecha,
            'AgenciaID' => $this->AgenciaID,
        ]);

        $query->andFilterWhere(['like', 'Comentario', $this->Comentario]);

        return $dataProvider;
    }
}
