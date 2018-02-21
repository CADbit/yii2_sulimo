<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "typ_zadania".
 *
 * @property int $id
 * @property string $nazwa
 *
 * @property Zadania[] $zadanias
 */
class TypZadania extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'typ_zadania';
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZadanias()
    {
        return $this->hasMany(Zadania::className(), ['typ' => 'id']);
    }
}
