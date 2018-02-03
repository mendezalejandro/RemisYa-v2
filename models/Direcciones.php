<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "direcciones".
 *
 * @property int $DireccionID
 * @property string $Direccion
 * @property string $DireccionCoordenada
 * @property int $DireccionDefault 1 - Es la direccion por defecto. 0 - Es una de las direcciones del Cliente/Agencia.
 * @property int $DireccionTipo 0 - Direccion de Cliente. 1 - Direccion de Agencia.
 * @property int $AplicacionID Corresponde al ID del registro segun el DireccionTipo.  Ej:  Si DireccionTipo= 0 entonces AplicacionID contiene el ID de una Persona. Si DireccionTipo = 1 entonces AplicacionID contiene el ID de una Agencia.
 */
class Direcciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'direcciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Direccion', 'DireccionCoordenada', 'DireccionDefault', 'DireccionTipo', 'AplicacionID'], 'required'],
            [['DireccionDefault', 'DireccionTipo', 'AplicacionID'], 'integer'],
            [['Direccion', 'DireccionCoordenada'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DireccionID' => 'Direccion ID',
            'Direccion' => 'Direccion',
            'DireccionCoordenada' => 'Direccion Coordenada',
            'DireccionDefault' => 'Direccion Default',
            'DireccionTipo' => 'Direccion Tipo',
            'AplicacionID' => 'Aplicacion ID',
        ];
    }
}
