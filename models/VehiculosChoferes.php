<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehiculoschoferes".
 *
 * @property int $VehiculoID
 * @property int $ChoferID
 */
class VehiculosChoferes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehiculoschoferes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VehiculoID', 'ChoferID'], 'required'],
            [['VehiculoID', 'ChoferID'], 'integer'],
            [['VehiculoID', 'ChoferID'], 'unique', 'targetAttribute' => ['VehiculoID', 'ChoferID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'VehiculoID' => 'Vehiculo ID',
            'ChoferID' => 'Chofer ID',
        ];
    }
}
