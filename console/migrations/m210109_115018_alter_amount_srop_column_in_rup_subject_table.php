<?php

use yii\db\Migration;

/**
 * Class m210109_115018_alter_amount_srop_column_in_rup_subject_table
 */
class m210109_115018_alter_amount_srop_column_in_rup_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%rup_subject}}', 'amount_srop', $this->float(2));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210109_115018_alter_amount_srop_column_in_rup_subject_table cannot be reverted.\n";

        return false;
    }
}
