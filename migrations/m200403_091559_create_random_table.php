<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%random}}`.
 */
class m200403_091559_create_random_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%random}}', [
            'id' => $this->primaryKey(),
            'value' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%random}}');
    }
}
