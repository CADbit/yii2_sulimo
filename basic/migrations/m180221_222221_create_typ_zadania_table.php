<?php

use yii\db\Migration;

/**
 * Handles the creation of table `typ_zadania`.
 */
class m180221_222221_create_typ_zadania_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('typ_zadania', [
            'id' => $this->primaryKey(),
            'nazwa' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('typ_zadania');
    }
}
