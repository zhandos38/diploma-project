<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%rup_subject}}`.
 */
class m201129_122042_add_code_column_to_rup_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%rup_subject}}', 'code', $this->string()->after('subject_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201129_122042_add_code_column_to_rup_subject_table can not be reverted";
        return false;
    }
}
