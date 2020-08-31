<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%teachers_load}}`.
 */
class m200830_180417_create_teachers_load_table extends Migration
{
    public $tableName = '{{%teachers_load}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer(),
            'teacher_id' => $this->integer(),
            'rup_subject_id' => $this->integer(),
            'practice' => $this->tinyInteger(2),
            'course_work' => $this->tinyInteger(2),
            'exam' => $this->float(),
            'block' => $this->float(),
            'year' => $this->tinyInteger(4),
            'tutor_connection' => $this->tinyInteger(2),
            'diploma_leader' => $this->tinyInteger(2),
            'amount_lecture' => $this->tinyInteger(1),
            'amount_practice' => $this->tinyInteger(1),
            'amount_lab' => $this->tinyInteger(1)
        ]);

        $this->addForeignKey('fk-teacher_load-group_id-group-id', $this->tableName, 'group_id', '{{%group}}', 'id', 'SET NULL');
        $this->addForeignKey('fk-teacher_load-teacher_id-teacher-id', $this->tableName, 'teacher_id', '{{%teacher}}', 'id', 'SET NULL');
        $this->addForeignKey('fk-teacher_load-rup_subject_id-teacher-id', $this->tableName, 'rup_subject_id', '{{%rup_subject}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%teachers_load}}');
    }
}
