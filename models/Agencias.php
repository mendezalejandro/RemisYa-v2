<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agencias".
 *
 * @property integer $AgenciaID
 * @property string $Nombre
 * @property string $Telefono
 * @property string $Email
 * @property integer $Estado
 * @property string $CUIT
 *
 * @property Agenciaspersonas[] $agenciaspersonas
 * @property Personas[] $personas
 * @property Calificaciones[] $calificaciones
 * @property Tarifas[] $tarifas
 * @property Turnos[] $turnos
 * @property Vehiculos[] $vehiculos
 * @property Viajes[] $viajes
 */
class Agencias extends \yii\db\ActiveRecord
{
    const TarifaHabilitada=0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agencias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Estado'], 'required'],
            [['Estado'], 'integer'],
            [['Nombre', 'Telefono', 'Email'], 'string', 'max' => 45],
            [['CUIT'], 'string', 'max' => 15],
            [['CUIT'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AgenciaID' => 'Agencia ID',
            'Nombre' => 'Nombre',
            'Telefono' => 'Telefono',
            'Email' => 'Email',
            'Estado' => 'Estado',
            'CUIT' => 'Cuit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgenciaspersonas()
    {
        return $this->hasMany(Agenciaspersonas::className(), ['AgenciaID' => 'AgenciaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Personas::className(), ['PersonaID' => 'PersonaID'])->viaTable('agenciaspersonas', ['AgenciaID' => 'AgenciaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalificaciones()
    {
        return $this->hasMany(Calificaciones::className(), ['AgenciaID' => 'AgenciaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifas()
    {
        return $this->hasMany(Tarifas::className(), ['AgenciaID' => 'AgenciaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turnos::className(), ['AgenciaID' => 'AgenciaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculos::className(), ['AgenciaID' => 'AgenciaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViajes()
    {
        return $this->hasMany(Viajes::className(), ['AgenciaID' => 'AgenciaID']);
    }
    public static function getDireccion()
    {
        $result = Direcciones::find()
        ->andWhere(['=', 'AplicacionID', Yii::$app->user->identity->agencia])
        ->andWhere(['=', 'DireccionTipo', 1])
        ->andWhere(['=', 'DireccionDefault', 1])
        ->all();
        return $result[0];
    }
    public static function getTarifaVigente()
    {
        $result = Tarifas::find()
        ->andWhere(['=', 'AgenciaID', Yii::$app->user->identity->agencia])
        ->andWhere(['=', 'Estado', self::TarifaHabilitada])
        ->all();
        return $result[0];
    }
}
