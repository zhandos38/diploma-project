<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%education}}`.
 */
class m200830_162313_create_education_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%education}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%education}}');
    }
}
