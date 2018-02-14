<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $description
 * @property string $datefrom
 * @property string $dateto
 * @property string $timefrom
 * @property string $timeto
 * @property integer $state
 * @property integer $idtype
 *
 * @property Type $idtype0
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['datefrom', 'dateto', 'timefrom', 'timeto'], 'safe'],
            [['state', 'idtype'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['idtype'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['idtype' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Zadanie',
            'datefrom' => 'Data od',
            'dateto' => 'Data do',
            'timefrom' => 'Czas od',
            'timeto' => 'Czas do',
            'state' => 'Zakończone',
            'idtype' => 'Idtype',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtype0()
    {
        return $this->hasOne(Type::className(), ['id' => 'idtype']);
    }
}
