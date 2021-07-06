<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%training_directopn}}`.
 */
class m210706_110347_create_training_direction_table extends Migration
{
    public $tableName = '{{%training_direction}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
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
