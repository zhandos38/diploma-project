<?php

use yii\db\Migration;

/**
 * Class m210105_141929_change_language_column_in_rup_table
 */
class m210105_141929_change_language_column_in_rup_table extends Migration
{
    public $tableName = '{{%rup}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn($this->tableName, 'language', 'lang');
        $this->alterColumn($this->tableName, 'lang', $this->tinyInteger(2));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210105_141929_change_language_column_in_rup_table cannot be reverted.\n";

        return false;
    }
}
