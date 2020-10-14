<?php

use yii\db\Migration;

/**
 * Class m201014_043641_add_external_links_to_subject_table
 */
class m201014_043641_add_external_links_to_subject_table extends Migration
{
    public $tableName = '{{%subject}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'component_item_id', $this->integer()->after('is_practice'));
        $this->addColumn($this->tableName, 'module_item_id', $this->integer()->after('component_item_id'));
//        $this->addColumn($this->tableName, 'subject_type_id', $this->integer());

        $this->addForeignKey('fk-subject-component_item_id-component-item-id', $this->tableName, 'component_item_id', 'component_item', 'id', 'SET NULL');
        $this->addForeignKey('fk-subject-module_item_id-component-item-id', $this->tableName, 'module_item_id', 'module_item', 'id', 'SET NULL');
//        $this->addForeignKey('fk-subject-subject_type_id-subject-id', $this->tableName, 'subject_type_id', 'module_item', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201014_043641_add_external_links_to_subject_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201014_043641_add_external_links_to_subject_table cannot be reverted.\n";

        return false;
    }
    */
}
