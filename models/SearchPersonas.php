<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * SearchPersonas represents the model behind the search form about `app\models\Usuarios`.
 */
class SearchPersonas extends Usuarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UsuarioID', 'RolID', 'Estado'], 'integer'],
            [['Usuario', 'Password', 'Telefono', 'Nombre', 'Apellido', 'Documento', 'Email'], 'safe'],
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
        $query = Usuarios::find();

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
            'UsuarioID' => $this->UsuarioID,
            'RolID' => $this->RolID,
            'Estado' => $this->Estado,
        ]);

        $query->andFilterWhere(['like', 'Usuario', $this->Usuario])
            ->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Apellido', $this->Apellido])
            ->andFilterWhere(['like', 'Documento', $this->Documento])
            ->andFilterWhere(['like', 'Email', $this->Email]);

        return $dataProvider;
    }
}
