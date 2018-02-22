<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zadania".
 *
 * @property int $id
 * @property int $typ
 * @property string $opis
 * @property int $stan
 * @property string $dataod
 * @property string $datado
 * @property string $godzinaod
 * @property string $godzinado
 *
 * @property TypZadania $typ0
 */
class Zadania extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zadania';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['typ', 'opis', 'dataod', 'godzinaod'], 'required'],
            [['typ'], 'integer'],
            [['dataod', 'datado', 'godzinaod', 'godzinado'], 'safe'],
            [['opis'], 'string', 'max' => 250],
            [['stan'], 'string', 'max' => 1],
            [['typ'], 'exist', 'skipOnError' => true, 'targetClass' => TypZadania::className(), 'targetAttribute' => ['typ' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'typ' => 'Typ',
            'opis' => 'Opis',
            'stan' => 'Stan',
            'dataod' => 'Dataod',
            'datado' => 'Datado',
            'godzinaod' => 'Godzinaod',
            'godzinado' => 'Godzinado',
        ];
    }

    /**
     * @return
     *
     */
    public function getTyprelation()
    {
        return $this->hasOne(TypZadania::class, ['id' => 'typ']);
    }

    public function getStanRelation(){
        return $this->hasOne(TypZadania::class, ['id' => 'stan']);
    }
}
