<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%specialty}}`.
 */
class m210705_060952_add_code_column_to_specialty_table extends Migration
{
    public $tableName = '{{%specialty}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'code', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210705_060952_add_code_column_to_specialty_table can not be reverted";

        return false;
    }
}
