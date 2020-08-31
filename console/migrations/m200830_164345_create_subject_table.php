<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subject}}`.
 */
class m200830_164345_create_subject_table extends Migration
{
    public $tableName = '{{%subject}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'component_id' => $this->integer(),
            'subject_type_id' => $this->integer(),
            'code' => $this->string(),
            'module_id' => $this->integer(),
            'language' => $this->string(2),
            'name' => $this->string(),
            'is_practice' => $this->boolean()
        ]);

        $this->addForeignKey('fk-subject-component_id-component-id', $this->tableName, 'component_id', '{{%component}}', 'id', 'SET NULL');
        $this->addForeignKey('fk-subject-subject_type_id-subject_type-id', $this->tableName, 'component_id', '{{%subject_type}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
