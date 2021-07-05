<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%specialty_group}}`.
 */
class m210705_053259_create_specialty_group_table extends Migration
{
    public $tableName = '{{%specialty_group}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'code' => $this->string(),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
