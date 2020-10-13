<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%student}}`.
 */
class m201013_161941_add_social_status_column_to_student_table extends Migration
{
    public $tableName = '{{%student}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'social_status', $this->tinyInteger(3));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migration can not be reverted!";
    }
}
