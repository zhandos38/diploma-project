<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%education_and_direction}}`.
 */
class m201014_171516_drop_education_and_direction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('{{%education}}');
        $this->dropTable('{{%education_direction}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migrate can not be reverted";
    }
}
