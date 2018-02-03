<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agenciaspersonas".
 *
 * @property int $AgenciaID
 * @property int $PersonaID
 *
 * @property Agencias $agencia
 * @property Personas $persona
 */
class Agenciaspersonas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agenciaspersonas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AgenciaID', 'PersonaID'], 'required'],
            [['AgenciaID', 'PersonaID'], 'integer'],
            [['AgenciaID', 'PersonaID'], 'unique', 'targetAttribute' => ['AgenciaID', 'PersonaID']],
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
            'AgenciaID' => 'Agencia ID',
            'PersonaID' => 'Persona ID',
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
}
