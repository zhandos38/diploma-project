<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%rup_subject}}`.
 */
class m210109_102145_add_amount_srop_column_to_rup_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%rup_subject}}', 'amount_srop', $this->tinyInteger(2)->after('amount_extra'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210109_102145_add_amount_srop_column_to_rup_subject_table cannot be reverted.\n";

        return false;
    }
}
