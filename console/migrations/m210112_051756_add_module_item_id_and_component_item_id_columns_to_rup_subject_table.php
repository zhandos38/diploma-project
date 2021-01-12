<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%rup_subject}}`.
 */
class m210112_051756_add_module_item_id_and_component_item_id_columns_to_rup_subject_table extends Migration
{
    public $tableName = '{{%rup_subject}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'module_item_id', $this->integer()->after('subject_id'));
        $this->addColumn($this->tableName, 'component_item_id', $this->integer()->after('module_item_id'));

        $this->addForeignKey('fk-rup-subject-component_item_id-component-item-id', $this->tableName, 'component_item_id', 'component_item', 'id', 'SET NULL');
        $this->addForeignKey('fk-rup-subject-module_item_id-component-item-id', $this->tableName, 'module_item_id', 'module_item', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210112_051756_add_module_item_id_and_component_item_id_columns_to_rup_subject_table cannot be reverted.\n";

        return false;
    }
}
