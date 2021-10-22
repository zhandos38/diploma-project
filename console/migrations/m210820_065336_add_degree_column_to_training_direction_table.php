<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%training_direction}}`.
 */
class m210820_065336_add_degree_column_to_training_direction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%training_direction}}', 'degree', $this->tinyInteger(2)->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210820_065336_add_degree_column_to_training_direction_table can not be reverted";

        return false;
    }
}
