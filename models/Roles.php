<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Roles".
 *
 * @property int $RolID
 * @property string $Descripcion
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'RolID' => 'Rol ID',
            'Descripcion' => 'Descripcion',
        ];
    }
}
