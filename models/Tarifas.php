<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tarifas".
 *
 * @property int $TarifaID
 * @property double $Comision
 * @property int $AgenciaID
 * @property double $ViajeMinimo
 * @property double $KmMinimo
 * @property double $PrecioKM
 * @property int $Estado
 *
 * @property Agencias $agencia
 * @property Viajes[] $viajes
 */
class Tarifas extends \yii\db\ActiveRecord
{
    const Estado_Habilitada = 0;
    const Estado_Deshabilitada = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tarifas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Comision', 'ViajeMinimo', 'KmMinimo', 'PrecioKM'], 'number'],
            [['AgenciaID', 'PrecioKM', 'Estado'], 'required'],
            [['AgenciaID', 'Estado'], 'integer'],
            [['AgenciaID'], 'exist', 'skipOnError' => true, 'targetClass' => Agencias::className(), 'targetAttribute' => ['AgenciaID' => 'AgenciaID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TarifaID' => 'Tarifa ID',
            'Comision' => 'Comision',
            'AgenciaID' => 'Agencia ID',
            'ViajeMinimo' => 'Viaje Minimo',
            'KmMinimo' => 'Km Minimo',
            'PrecioKM' => 'Precio Km',
            'Estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgencia()
    {
        return $this->hasOne(Agencias::className(), ['AgenciaID' => 'AgenciaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViajes()
    {
        return $this->hasMany(Viajes::className(), ['TarifaID' => 'TarifaID']);
    }
}
