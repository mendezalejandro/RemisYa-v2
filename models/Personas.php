<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property int $PersonaID
 * @property string $Usuario
 * @property string $Password
 * @property string $Telefono
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Documento
 * @property string $Email
 * @property int $RolID
 * @property int $Estado 1 - Habilitado 2 - Deshabilitado
 *
 * @property Agenciaspersonas[] $agenciaspersonas
 * @property Agencias[] $agencias
 * @property Calificaciones[] $calificaciones
 * @property Calificaciones[] $calificaciones0
 * @property Roles $rol
 * @property Turnos[] $turnos
 * @property Viajes[] $viajes
 * @property Viajes[] $viajes0
 */
class Personas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Apellido', 'RolID'], 'required'],
            [['RolID', 'Estado'], 'integer'],
            [['Usuario', 'Password', 'Telefono', 'Nombre', 'Apellido', 'Email'], 'string', 'max' => 45],
            [['Documento'], 'string', 'max' => 15],
            [['Usuario'], 'unique'],
            [['Email'], 'unique'],
            [['Documento'], 'unique'],
            [['RolID'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['RolID' => 'RolID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PersonaID' => 'Persona ID',
            'Usuario' => 'Usuario',
            'Password' => 'Password',
            'Telefono' => 'Telefono',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'Documento' => 'Documento',
            'Email' => 'Email',
            'RolID' => 'Rol ID',
            'Estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgenciaspersonas()
    {
        return $this->hasMany(Agenciaspersonas::className(), ['PersonaID' => 'PersonaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgencias()
    {
        return $this->hasMany(Agencias::className(), ['AgenciaID' => 'AgenciaID'])->viaTable('agenciaspersonas', ['PersonaID' => 'PersonaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalificaciones()
    {
        return $this->hasMany(Calificaciones::className(), ['ParaQuien' => 'PersonaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalificaciones0()
    {
        return $this->hasMany(Calificaciones::className(), ['Quien' => 'PersonaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Roles::className(), ['RolID' => 'RolID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turnos::className(), ['PersonaID' => 'PersonaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViajes()
    {
        return $this->hasMany(Viajes::className(), ['ChoferID' => 'PersonaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViajes0()
    {
        return $this->hasMany(Viajes::className(), ['PersonaID' => 'PersonaID']);
    }
}
