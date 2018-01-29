<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turnos".
 *
 * @property int $TurnoID
 * @property int $PersonaID
 * @property string $FechaApertura
 * @property string $FechaCierre
 * @property int $AgenciaID
 * @property int $Estado 0 - Abierta 1 - Cerrada
 *
 * @property Agencias $agencia
 * @property Personas $persona
 * @property Viajes[] $viajes
 */
class Turnos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turnos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PersonaID', 'Estado'], 'required'],
            [['PersonaID', 'AgenciaID', 'Estado'], 'integer'],
            [['FechaApertura', 'FechaCierre'], 'safe'],
            [['AgenciaID'], 'exist', 'skipOnError' => true, 'targetClass' => Agencias::className(), 'targetAttribute' => ['AgenciaID' => 'AgenciaID']],
            [['PersonaID'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['PersonaID' => 'PersonaID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TurnoID' => 'Turno ID',
            'PersonaID' => 'Persona ID',
            'FechaApertura' => 'Fecha Apertura',
            'FechaCierre' => 'Fecha Cierre',
            'AgenciaID' => 'Agencia ID',
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
    public function getPersona()
    {
        return $this->hasOne(Personas::className(), ['PersonaID' => 'PersonaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViajes()
    {
        return $this->hasMany(Viajes::className(), ['TurnoID' => 'TurnoID']);
    }
}
