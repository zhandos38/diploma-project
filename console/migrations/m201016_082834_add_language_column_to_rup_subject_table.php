<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%rup_subject}}`.
 */
class m201016_082834_add_language_column_to_rup_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('rup_subject', 'language', $this->tinyInteger(2)->defaultValue(0)->after('subject_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migrate can not be reverted";
    }
}
