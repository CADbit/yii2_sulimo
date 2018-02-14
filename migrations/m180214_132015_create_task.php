<?php

use yii\db\Migration;

/**
 * Class m180214_132015_create_task
 */
class m180214_132015_create_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull(),
            'start_date' => $this->date(),
            'end_date' => $this->date(),
            'start_time' => $this->string()->notNull(),
            'end_time' => $this->string()->notNull(),
            'description' => $this->string(250)->notNull(),
            'status' => $this->boolean()->defaultValue(false)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180214_132015_create_task cannot be reverted.\n";

        return false;
    }
}
