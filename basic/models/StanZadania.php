<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stan_zadania".
 *
 * @property int $id
 * @property string $nazwa
 */
class StanZadania extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stan_zadania';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nazwa'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nazwa' => 'Nazwa',
        ];
    }
}
