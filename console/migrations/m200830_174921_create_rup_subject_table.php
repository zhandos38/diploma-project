<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rup_subject}}`.
 */
class m200830_174921_create_rup_subject_table extends Migration
{
    public $tableName = '{{%rup_subject}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'rup_id' => $this->integer(),
            'subject_id' => $this->integer(),
            'semester' => $this->tinyInteger(),
            'amount_lecture' => $this->tinyInteger(2),
            'amount_practice' => $this->tinyInteger(2),
            'amount_lab' => $this->tinyInteger(2),
            'is_course_work' => $this->boolean()->defaultValue(0),
            'is_gos' => $this->boolean()->defaultValue(0),
            'is_exam' => $this->boolean()->defaultValue(0)
        ]);

        $this->addForeignKey('fk-rup-subject-rup_id-rup-id', $this->tableName, 'rup_id', '{{%rup}}', 'id', 'SET NULL');
        $this->addForeignKey('fk-rup-subject-subject_id-subject-id', $this->tableName, 'subject_id', '{{%subject}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
