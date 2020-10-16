<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%education_and_direction_columns_in_rup}}`.
 */
class m201014_171220_drop_education_and_direction_columns_in_rup_table extends Migration
{
    public $tableName = '{{%rup}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn($this->tableName, 'direction_id');
        $this->dropColumn($this->tableName, 'education_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migrate can not be reverted";
    }
}
