<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calificaciones".
 *
 * @property int $CalificacionID
 * @property int $ViajeID
 * @property int $Quien
 * @property int $ParaQuien
 * @property int $Puntaje
 * @property string $Fecha
 * @property string $Comentario
 * @property int $AgenciaID
 *
 * @property Agencias $agencia
 * @property Personas $paraQuien
 * @property Personas $quien
 * @property Viajes $viaje
 */
class Calificaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calificaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ViajeID', 'Quien', 'ParaQuien', 'Puntaje', 'Comentario', 'AgenciaID'], 'required'],
            [['ViajeID', 'Quien', 'ParaQuien', 'Puntaje', 'AgenciaID'], 'integer'],
            [['Fecha'], 'safe'],
            [['Comentario'], 'string', 'max' => 200],
            [['AgenciaID'], 'exist', 'skipOnError' => true, 'targetClass' => Agencias::className(), 'targetAttribute' => ['AgenciaID' => 'AgenciaID']],
            [['ParaQuien'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['ParaQuien' => 'PersonaID']],
            [['Quien'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['Quien' => 'PersonaID']],
            [['ViajeID'], 'exist', 'skipOnError' => true, 'targetClass' => Viajes::className(), 'targetAttribute' => ['ViajeID' => 'ViajeID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CalificacionID' => 'Calificacion ID',
            'ViajeID' => 'Viaje ID',
            'Quien' => 'Quien',
            'ParaQuien' => 'Para Quien',
            'Puntaje' => 'Puntaje',
            'Fecha' => 'Fecha',
            'Comentario' => 'Comentario',
            'AgenciaID' => 'Agencia ID',
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
    public function getParaQuien()
    {
        return $this->hasOne(Personas::className(), ['PersonaID' => 'ParaQuien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuien()
    {
        return $this->hasOne(Personas::className(), ['PersonaID' => 'Quien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViaje()
    {
        return $this->hasOne(Viajes::className(), ['ViajeID' => 'ViajeID']);
    }
}
