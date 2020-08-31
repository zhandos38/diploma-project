<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subject_type}}`.
 */
class m200830_160418_create_subject_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subject_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subject_type}}');
    }
}
