<?php

use yii\db\Migration;

/**
 * Handles the creation of table `zadania`.
 */
class m180221_222230_create_zadania_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('zadania', [
            'id' => $this->primaryKey(),
            'typ' => $this->integer()->notNull(),
            'opis' => $this->string(250)->notNull(),
            'stan' => $this->integer()->notNull(),
            'dataod' => $this->date()->notNull(),
            'datado' => $this->date()->null(),
            'godzinaod' => $this->time()->notNull(),
            'godzinado' => $this->time()->null(),
        ]);

        $this->addForeignKey(
            'fk-zadania-typ',
            'zadania',
            'typ',
            'typ_zadania',
            'id'
        );

        $this->addForeignKey(
            'fk-zadania-stan',
            'zadania',
            'stan',
            'stan_zadania',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('zadania');
    }
}
