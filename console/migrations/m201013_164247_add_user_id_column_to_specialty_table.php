<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%education}}`.
 */
class m201013_164247_add_user_id_column_to_specialty_table extends Migration
{
    public $tableName = '{{%specialty}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'user_id', $this->integer());

        $this->addForeignKey('fk-specialty-user_id-user-id', $this->tableName, 'user_id', 'user', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migration can not be reverted!";
    }
}
