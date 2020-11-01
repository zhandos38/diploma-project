<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%code_column_in_subject}}`.
 */
class m201101_162004_drop_code_column_in_subject_table extends Migration
{
    public $tableName = '{{%subject}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn($this->tableName, 'code');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migration can not be reverted";
    }
}
