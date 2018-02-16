<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuariosagencia".
 *
 * @property int $AgenciaID
 * @property int $UsuarioID
 *
 * @property Agencias $agencia
 * @property Usuarios $usuario
 */
class Usuariosagencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuariosagencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AgenciaID', 'UsuarioID'], 'required'],
            [['AgenciaID', 'UsuarioID'], 'integer'],
            [['AgenciaID', 'UsuarioID'], 'unique', 'targetAttribute' => ['AgenciaID', 'UsuarioID']],
            [['AgenciaID'], 'exist', 'skipOnError' => true, 'targetClass' => Agencias::className(), 'targetAttribute' => ['AgenciaID' => 'AgenciaID']],
            [['UsuarioID'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['UsuarioID' => 'UsuarioID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AgenciaID' => 'Agencia ID',
            'UsuarioID' => 'Usuario ID',
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
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['UsuarioID' => 'UsuarioID']);
    }
}
