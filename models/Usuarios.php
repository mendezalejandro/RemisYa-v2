<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
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
class Usuarios extends \yii\db\ActiveRecord implements IdentityInterface
{
    const Estado_Habilitado = 0;
    const Estado_Deshabilitado = 1;

    const Rol_Administrador = 1;
    const Rol_Recepcionista = 2;
    const Rol_Chofer = 3;
    const Rol_Cliente = 4;
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuariosagencia()
    {
        return $this->hasMany(Usuariosagencia::className(), ['UsuarioID' => 'UsuarioID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgencias()
    {
        return $this->hasMany(Agencias::className(), ['AgenciaID' => 'AgenciaID'])->viaTable('usuariosagencia', ['UsuarioID' => 'UsuarioID']);
    }

    public function getAgencia()
    {
        return $this->agencias[0]->AgenciaID;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalificaciones()
    {
        return $this->hasMany(Calificaciones::className(), ['ParaQuien' => 'UsuarioID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalificaciones0()
    {
        return $this->hasMany(Calificaciones::className(), ['Quien' => 'UsuarioID']);
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
        return $this->hasMany(Turnos::className(), ['UsuarioID' => 'UsuarioID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViajes()
    {
        return $this->hasMany(Viajes::className(), ['ChoferID' => 'UsuarioID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViajes0()
    {
        return $this->hasMany(Viajes::className(), ['UsuarioID' => 'UsuarioID']);
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \yii\base\NotSupportedException();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['Usuario'=>$username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->UsuarioID;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        //return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        //return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        /*if ($this->RolID==4 or $this->RolID==1){
            if (hash_equals($this->Password, crypt($password, $this->Password))) {           //Compara el hash con el password ingresado, si son iguales devuelve true
                return true;
            }
            else{
                return false;
            }
        }else{
            return $this->Password === $password;
        }*/
        return $this->Password === $password;
    }
    public static function getClientes()
    {
        return self::find()
        ->joinWith(['agencias'])
        ->andFilterWhere(['=', 'RolID', self::Rol_Cliente])
        ->andWhere(['=', 'Agencias.AgenciaID', Yii::$app->user->identity->agencia])
        ->all();
    }
    public static function getChoferes()
    {
        return self::find()
        ->joinWith(['agencias'])
        ->andFilterWhere(['=', 'RolID', self::Rol_Chofer])
        ->andWhere(['=', 'Agencias.AgenciaID', Yii::$app->user->identity->agencia])
        ->all();
    }
    public static function getChoferesDisponibles()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand('
            SELECT P.* FROM UsuariosAgencia AP
            INNER JOIN Usuarios P ON P.UsuarioID = AP.UsuarioID
            WHERE AP.AgenciaID = '.Yii::$app->user->identity->agencia.' AND P.RolID = '.self::Rol_Chofer.'
            AND P.UsuarioID NOT IN 
            (
            SELECT P.UsuarioID FROM UsuariosAgencia AP
            INNER JOIN Usuarios P ON P.UsuarioID = AP.UsuarioID
            INNER JOIN Viajes V ON V.ChoferID = P.UsuarioID
            WHERE AP.AgenciaID = '.Yii::$app->user->identity->agencia.' AND V.Estado = '.Viajes::Estado_EnViaje.' AND P.RolID = '.self::Rol_Chofer.'
            )');
        $result = $command->queryAll();
        return $result;
    }
    public static function getTurnoVigente()
    {
        $result = Turnos::find()
        ->andWhere(['=', 'AgenciaID', Yii::$app->user->identity->agencia])
        ->andWhere(['=', 'Estado', 0])
        ->andWhere(['=', 'UsuarioID', Yii::$app->user->identity->UsuarioID])
        ->all();
        if(count($result)==0)
            throw new \yii\base\UserException('Su usuario no tiene ningun turno abierto. 
                Puede abrir un nuevo turno desde el menu "Turnos/Administrar"');
        else
            return $result[0];
    }

}
