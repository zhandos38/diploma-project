<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%subject}}`.
 */
class m211022_065849_add_is_repeat_column_to_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('subject', 'is_repeat', $this->boolean()->after('module_item_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211022_065849_add_is_repeat_column_to_subject_table can not be reverted";

        return false;
    }
}
