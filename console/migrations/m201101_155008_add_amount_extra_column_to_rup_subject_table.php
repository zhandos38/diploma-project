<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%rup_subject}}`.
 */
class m201101_155008_add_amount_extra_column_to_rup_subject_table extends Migration
{
    public $tableName = '{{%rup_subject}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'amount_extra', $this->tinyInteger()->after('amount_lab'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'amount_extra');
    }
}
