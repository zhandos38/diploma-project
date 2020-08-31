<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%component}}`.
 */
class m200830_160420_create_component_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%component}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%component}}');
    }
}
