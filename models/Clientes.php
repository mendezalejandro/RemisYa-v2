<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Clientes".
 *
 * @property int $ClienteID
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Documento
 * @property string $Telefono
 * @property string $Email
 * @property int $Estado 1 - Habilitado 2 - Deshabilitado
 * @property string $Codigo
 */
class Clientes extends \yii\db\ActiveRecord
{
    const Estado_Habilitada = 0;
    const Estado_Deshabilitada = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Clientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Apellido'], 'required'],
            [['Estado'], 'integer'],
            [['Nombre', 'Apellido', 'Telefono', 'Email'], 'string', 'max' => 45],
            [['Documento'], 'string', 'max' => 15],
            [['Codigo'], 'string', 'max' => 6],
            [['Email'], 'unique'],
            [['Documento'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ClienteID' => 'Cliente ID',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'Documento' => 'Documento',
            'Telefono' => 'Telefono',
            'Email' => 'Email',
            'Estado' => 'Estado',
            'Codigo' => 'Codigo',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalificaciones()
    {
        return $this->hasMany(Calificaciones::className(), ['ParaQuien' => 'ClienteID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalificaciones0()
    {
        return $this->hasMany(Calificaciones::className(), ['Quien' => 'ClienteID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViajes()
    {
        return $this->hasMany(Viajes::className(), ['ClienteID' => 'ClienteID']);
    }
}
