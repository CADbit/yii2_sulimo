<?php

use yii\db\Migration;

/**
 * Handles the creation of table `stan_zadania`.
 */
class m180221_104640_create_stan_zadania_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('stan_zadania', [
            'id' => $this->primaryKey(),
            'nazwa' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('stan_zadania');
    }
}
