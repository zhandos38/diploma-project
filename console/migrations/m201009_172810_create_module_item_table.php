<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%module_item}}`.
 */
class m201009_172810_create_module_item_table extends Migration
{
    public $tableName = '{{%module_item}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'module_id' => $this->integer()
        ]);

        $this->addForeignKey('fk-module-item-module_id-module-id', $this->tableName, 'module_id', 'module', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-module-item-module_id-module-id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
