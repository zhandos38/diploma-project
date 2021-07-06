<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%specialty_group}}`.
 */
class m210706_111812_add_training_direction_id_column_to_specialty_group_table extends Migration
{
    public $tableName = '{{%specialty_group}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'training_direction_id', $this->integer());

        $this->addForeignKey('fk-specialty_group-training_direction_id', $this->tableName, 'training_direction_id', 'specialty_group', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210706_111812_add_training_direction_id_column_to_specialty_group_table can not be reverted";

        return false;
    }
}
