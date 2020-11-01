<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%language_column_in_subject}}`.
 */
class m201016_080036_drop_language_column_in_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('subject', 'language');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migrate can not be reverted";
    }
}
