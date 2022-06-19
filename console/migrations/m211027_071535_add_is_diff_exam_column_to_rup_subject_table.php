<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%rup_subject}}`.
 */
class m211027_071535_add_is_diff_exam_column_to_rup_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('rup_subject', 'is_exam_diff', $this->boolean()->after('is_exam')->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211027_071535_add_is_diff_exam_column_to_rup_subject_table can not be reverted";
        return false;
    }
}
