<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m200830_163530_create_student_table extends Migration
{
    public $tableName = '{{%student}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'surname' => $this->string(),
            'name' => $this->string(),
            'patronymic' => $this->string(),
            'group_id' => $this->integer(),
            'phone' => $this->string(20),
            'phone_parent' => $this->string(20),
            'iin' => $this->string(20)
        ]);

        $this->addForeignKey('fk-student-group_id-group-id', $this->tableName, 'group_id', '{{%group}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
