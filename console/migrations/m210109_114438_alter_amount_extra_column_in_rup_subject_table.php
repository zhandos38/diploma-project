<?php

use yii\db\Migration;

/**
 * Class m210109_114438_alter_amount_columns_in_rup_sbuject_table
 */
class m210109_114438_alter_amount_extra_column_in_rup_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%rup_subject}}', 'amount_extra', $this->float(2));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210109_114438_alter_amount_extra_column_in_rup_subject_table cannot be reverted.\n";

        return false;
    }
}
