<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "viajes".
 *
 * @property int $ViajeID
 * @property int $ChoferID
 * @property int $RecepcionistaID
 * @property int $VehiculoID
 * @property int $TarifaID
 * @property int $TurnoID
 * @property int $AgenciaID
 * @property int $ClienteID Si el viaje Reservado es manualmente (Personal o por Telefono) el usuario puede ser NULL ya que no se tiene registro en ese momento.
 * @property string $FechaEmision
 * @property string $FechaSalida
 * @property int $ViajeTipo Viajes Reservados con la siguiente modalidad:  0 - Web 1 - Personal 2 - Telefonico
 * @property string $OrigenCoordenadas
 * @property string $DestinoCoordenadas
 * @property string $OrigenDireccion
 * @property string $DestinoDireccion
 * @property string $Comentario
 * @property double $ImporteTotal
 * @property double $Distancia
 * @property int $Estado 0 - Pagado (En viaje) 1 - Reservado 2 - Cancelado 3 - Finalizado (Cierre de circuito) 
 *
 * @property Calificaciones[] $calificaciones
 * @property Agencias $agencia
 * @property Usuarios $chofer
 * @property Usuarios $recepcionista
 * @property Clientes $cliente
 * @property Tarifas $tarifa
 * @property Turnos $turno
 * @property Vehiculos $vehiculo
 */
class Viajes extends \yii\db\ActiveRecord
{
    const Estado_EnViaje = 0;
    const Estado_Reservado = 1;
    const Estado_Cancelado = 2;
    const Estado_Finalizado = 3;

    const Tipo_Web = 0;
    const Tipo_Personal = 1;
    const Tipo_Telefonico = 2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'viajes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ChoferID', 'VehiculoID', 'TarifaID', 'TurnoID', 'AgenciaID', 'ClienteID', 'ViajeTipo', 'Estado','RecepcionistaID'], 'integer'],
            [['TarifaID', 'AgenciaID', 'ViajeTipo', 'Estado'], 'required'],
            [['FechaEmision', 'FechaSalida'], 'safe'],
            [['ImporteTotal', 'Distancia'], 'number'],
            [['OrigenCoordenadas', 'DestinoCoordenadas', 'OrigenDireccion', 'DestinoDireccion', 'Comentario'], 'string', 'max' => 200],
            [['AgenciaID'], 'exist', 'skipOnError' => true, 'targetClass' => Agencias::className(), 'targetAttribute' => ['AgenciaID' => 'AgenciaID']],
            [['ChoferID'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['ChoferID' => 'UsuarioID']],
            [['RecepcionistaID'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['RecepcionistaID' => 'UsuarioID']],
            [['ClienteID'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['ClienteID' => 'ClienteID']],
            [['TarifaID'], 'exist', 'skipOnError' => true, 'targetClass' => Tarifas::className(), 'targetAttribute' => ['TarifaID' => 'TarifaID']],
            [['TurnoID'], 'exist', 'skipOnError' => true, 'targetClass' => Turnos::className(), 'targetAttribute' => ['TurnoID' => 'TurnoID']],
            [['VehiculoID'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculos::className(), 'targetAttribute' => ['VehiculoID' => 'VehiculoID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ViajeID' => 'Viaje ID',
            'ChoferID' => 'Chofer ID',
            'RecepcionistaID' => 'Recepcionista ID',
            'VehiculoID' => 'Vehiculo ID',
            'TarifaID' => 'Tarifa ID',
            'TurnoID' => 'Turno ID',
            'AgenciaID' => 'Agencia ID',
            'ClienteID' => 'Cliente ID',
            'FechaEmision' => 'Fecha Emision',
            'FechaSalida' => 'Fecha Salida',
            'ViajeTipo' => 'Viaje Tipo',
            'OrigenCoordenadas' => 'Origen Coordenadas',
            'DestinoCoordenadas' => 'Destino Coordenadas',
            'OrigenDireccion' => 'Origen Direccion',
            'DestinoDireccion' => 'Destino Direccion',
            'Comentario' => 'Comentario',
            'ImporteTotal' => 'Importe Total',
            'Distancia' => 'Distancia',
            'Estado' => 'Estado',
            'nombreCompleto' => Yii::t('app', 'Nombre Completo')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalificaciones()
    {
        return $this->hasMany(Calificaciones::className(), ['ViajeID' => 'ViajeID']);
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
    public function getChofer()
    {
        return $this->hasOne(Usuarios::className(), ['UsuarioID' => 'ChoferID']);
    }
    public function getRecepcionista()
    {
        return $this->hasOne(Usuarios::className(), ['UsuarioID' => 'RecepcionistaID']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['ClienteID' => 'ClienteID']);
    }
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['UsuarioID' => 'ClienteID']);
    }
    public function getNombreCompleto() {
        if($this->usuario == null){
            return "";
        }
        else{
            return $this->usuario->Nombre . ' ' . $this->usuario->Apellido;
        }
        
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifa()
    {
        return $this->hasOne(Tarifas::className(), ['TarifaID' => 'TarifaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurno()
    {
        return $this->hasOne(Turnos::className(), ['TurnoID' => 'TurnoID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculo()
    {
        return $this->hasOne(Vehiculos::className(), ['VehiculoID' => 'VehiculoID']);
    }
}
