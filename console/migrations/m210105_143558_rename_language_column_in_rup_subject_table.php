<?php

use yii\db\Migration;

/**
 * Class m210105_143558_rename_language_column_in_rup_subject_table
 */
class m210105_143558_rename_language_column_in_rup_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('{{%rup_subject}}', 'language', 'lang');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210105_143558_rename_language_column_in_rup_subject_table cannot be reverted.\n";

        return false;
    }
}
