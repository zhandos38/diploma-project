<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%training_direction}}`.
 */
class m210706_111321_add_code_column_to_training_direction_table extends Migration
{
    public $tableName = '{{%training_direction}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'code', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210706_111321_add_code_column_to_training_direction_table can not be reverted";

        return false;
    }
}
