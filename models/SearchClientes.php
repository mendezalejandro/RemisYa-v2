<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clientes;
//include \Yii::$app->basePath.'/models/Constantes.php';
/**
 * SearchPersonas represents the model behind the search form about `app\models\Usuarios`.
 */
class SearchClientes extends Clientes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ClienteID', 'Estado'], 'integer'],
            [['Codigo', 'Telefono', 'Nombre', 'Apellido', 'Documento', 'Email'], 'safe'],
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
        $query = Clientes::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //$query->joinWith(['agencias']);

        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ClienteID' => $this->ClienteID,
            'Estado' => $this->Estado,
            //'Agencias.AgenciaID' => Yii::$app->user->identity->agencia,
        ]);

        $query->andFilterWhere(['like', 'Codigo', $this->Codigo])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Apellido', $this->Apellido])
            ->andFilterWhere(['like', 'Documento', $this->Documento])
            ->andFilterWhere(['like', 'Email', $this->Email]);

        return $dataProvider;
    }
}
