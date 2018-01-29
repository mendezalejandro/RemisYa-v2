<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehiculos".
 *
 * @property int $VehiculoID
 * @property int $AgenciaID
 * @property string $Matricula
 * @property string $Modelo
 * @property string $Marca
 * @property string $Estado
 * @property string $FechaAlta
 * @property string $FechaBaja
 *
 * @property Agencias $agencia
 * @property Viajes[] $viajes
 */
class Vehiculos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehiculos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AgenciaID', 'Estado'], 'required'],
            [['AgenciaID'], 'integer'],
            [['FechaAlta', 'FechaBaja'], 'safe'],
            [['Matricula', 'Modelo', 'Marca', 'Estado'], 'string', 'max' => 45],
            [['AgenciaID'], 'exist', 'skipOnError' => true, 'targetClass' => Agencias::className(), 'targetAttribute' => ['AgenciaID' => 'AgenciaID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'VehiculoID' => 'Vehiculo ID',
            'AgenciaID' => 'Agencia ID',
            'Matricula' => 'Matricula',
            'Modelo' => 'Modelo',
            'Marca' => 'Marca',
            'Estado' => 'Estado',
            'FechaAlta' => 'Fecha Alta',
            'FechaBaja' => 'Fecha Baja',
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
        return $this->hasMany(Viajes::className(), ['VehiculoID' => 'VehiculoID']);
    }
}
