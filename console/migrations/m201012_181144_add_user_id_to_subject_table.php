<?php

use yii\db\Migration;

/**
 * Class m201012_181144_add_user_id_to_subject_table
 */
class m201012_181144_add_user_id_to_subject_table extends Migration
{
    public $tableName = '{{%subject}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'user_id', $this->integer());
        $this->addForeignKey('fk-subject-user_id-user-id', $this->tableName, 'user_id', 'user', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201012_181144_add_user_id_to_subject_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201012_181144_add_user_id_to_subject_table cannot be reverted.\n";

        return false;
    }
    */
}
