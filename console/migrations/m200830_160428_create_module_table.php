<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%module}}`.
 */
class m200830_160428_create_module_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%module}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'number' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%module}}');
    }
}
