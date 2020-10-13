<?php

use yii\db\Migration;

/**
 * Class m201013_170402_add_user_id_to_component_table
 */
class m201013_170402_add_user_id_to_component_table extends Migration
{
    public $tableName = '{{%component}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'user_id', $this->integer());

        $this->addForeignKey('fk-component-user+id-user-id', $this->tableName, 'user_id', 'user', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201013_170402_add_user_id_to_component_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201013_170402_add_user_id_to_component_table cannot be reverted.\n";

        return false;
    }
    */
}
