<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%education_direction}}`.
 */
class m200929_152912_create_education_direction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%education_direction}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%education_direction}}');
    }
}
