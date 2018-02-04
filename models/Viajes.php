<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "viajes".
 *
 * @property int $ViajeID
 * @property int $ChoferID
 * @property int $VehiculoID
 * @property int $TarifaID
 * @property int $TurnoID
 * @property int $AgenciaID
 * @property int $PersonaID Si el viaje Reservado es manualmente (Personal o por Telefono) el usuario puede ser NULL ya que no se tiene registro en ese momento.
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
 * @property Personas $chofer
 * @property Personas $persona
 * @property Tarifas $tarifa
 * @property Turnos $turno
 * @property Vehiculos $vehiculo
 */
class Viajes extends \yii\db\ActiveRecord
{
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
            [['ChoferID', 'VehiculoID', 'TarifaID', 'TurnoID', 'AgenciaID', 'PersonaID', 'ViajeTipo', 'Estado'], 'integer'],
            [['TarifaID', 'AgenciaID', 'ViajeTipo', 'Estado'], 'required'],
            [['FechaEmision', 'FechaSalida'], 'safe'],
            [['ImporteTotal', 'Distancia'], 'number'],
            [['OrigenCoordenadas', 'DestinoCoordenadas', 'OrigenDireccion', 'DestinoDireccion', 'Comentario'], 'string', 'max' => 200],
            [['AgenciaID'], 'exist', 'skipOnError' => true, 'targetClass' => Agencias::className(), 'targetAttribute' => ['AgenciaID' => 'AgenciaID']],
            [['ChoferID'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['ChoferID' => 'PersonaID']],
            [['PersonaID'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['PersonaID' => 'PersonaID']],
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
            'VehiculoID' => 'Vehiculo ID',
            'TarifaID' => 'Tarifa ID',
            'TurnoID' => 'Turno ID',
            'AgenciaID' => 'Agencia ID',
            'PersonaID' => 'Persona ID',
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
        return $this->hasOne(Personas::className(), ['PersonaID' => 'ChoferID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Personas::className(), ['PersonaID' => 'PersonaID']);
    }

    public function getNombreCompleto() {
        return $this->persona->Nombre . ' ' . $this->persona->Apellido;
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
