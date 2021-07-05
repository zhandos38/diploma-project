<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%user_id_column_in_specialty}}`.
 */
class m210705_092115_drop_user_id_column_in_specialty_table extends Migration
{
    public $tableName = '{{%specialty}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-specialty-user_id-user-id', $this->tableName);
        $this->dropColumn($this->tableName, 'user_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210705_092115_drop_user_id_column_in_specialty_table can not be reverted";
    }
}
