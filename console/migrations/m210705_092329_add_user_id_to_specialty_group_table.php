<?php

use yii\db\Migration;

/**
 * Class m210705_092329_add_user_id_to_specialty_group_table
 */
class m210705_092329_add_user_id_to_specialty_group_table extends Migration
{
    public $tableName = '{{%specialty_group}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'user_id', $this->integer());
        $this->addForeignKey('fk-specialty-user_id', $this->tableName, 'user_id', 'user', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210705_092329_add_user_id_to_specialty_group_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210705_092329_add_user_id_to_specialty_group_table cannot be reverted.\n";

        return false;
    }
    */
}
