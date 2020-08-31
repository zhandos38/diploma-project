<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%speciality}}`.
 */
class m200830_162031_create_specialty_table extends Migration
{
    public $tableName = '{{%specialty}}';

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
