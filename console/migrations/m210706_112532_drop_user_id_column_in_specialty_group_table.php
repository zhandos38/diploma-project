<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%user_id_column_in_specialty_group}}`.
 */
class m210706_112532_drop_user_id_column_in_specialty_group_table extends Migration
{
    public $tableName = '{{%specialty_group}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-specialty-user_id', $this->tableName);
        $this->dropColumn($this->tableName, 'user_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210706_112532_drop_user_id_column_in_specialty_group_table can not be reverted";

        return false;
    }
}
