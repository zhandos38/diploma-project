<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%component_item}}`.
 */
class m201009_172533_create_component_item_table extends Migration
{
    public $tableName = '{{%component_item}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'component_id' => $this->integer()
        ]);

        $this->addForeignKey('fk-component-item-component_id-component-id', $this->tableName, 'component_id', 'component', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-component-item-component_id-component-id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
