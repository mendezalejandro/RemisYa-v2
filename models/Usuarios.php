<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
/**
 * This is the model class for table "usuarios".
 *
 * @property int $UsuarioID
 * @property string $Usuario
 * @property string $Password
 * @property string $Telefono
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Documento
 * @property string $Email
 * @property int $RolID
 * @property int $Estado 1 - Habilitado 2 - Deshabilitado
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UsuarioID' => 'Usuario ID',
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
}
