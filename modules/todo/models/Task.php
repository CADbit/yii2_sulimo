<?php

namespace app\modules\todo\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $type
 * @property string $start_date
 * @property string $end_date
 * @property string $start_time
 * @property string $end_time
 * @property string $description
 * @property bool $status
 */
class Task extends \yii\db\ActiveRecord
{
    const TYPES = [
        'zadanie' => 'zadanie',
        'spotkanie' => 'spotkanie',
        'kolacja' => 'kolacja',
        'szkolenie' => 'szkolenie',
        'inne' => 'inne'
    ];

    public static $TIMES = [];

    public function __construct(){
        parent::__construct();

        // wygeneruj wszystkie możliwe wartości pól
        // do wyboru czasu
        for ($i = 8; $i < 21; $i++){
            for ($j = 0; $j < 46; $j += 15){
                $s = sprintf('%02d:%02d', $i, $j);
                self::$TIMES[$s] = $s;
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'start_time', 'end_time', 'description'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['status'], 'boolean'],
            [['type', 'start_time', 'end_time'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}
