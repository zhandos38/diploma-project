<?php

use yii\db\Migration;

/**
 * Class m210705_054059_add_specialty_group_id_to_specialty_table
 */
class m210705_054059_add_specialty_group_id_to_specialty_table extends Migration
{
    public $tableName = '{{%specialty}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'specialty_group_id', $this->integer());

        $this->addForeignKey('fk-specialty-specialty_group_id', $this->tableName, 'specialty_group_id', 'specialty_group', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210705_054059_add_specialty_group_id_to_specialty_table cannot be reverted.\n";

        return false;
    }
}
