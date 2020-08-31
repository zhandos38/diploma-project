<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group}}`.
 */
class m200830_163114_create_group_table extends Migration
{
    public $tableName = '{{%group}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'language' => $this->string(2),
            'degree' => $this->tinyInteger(2),
            'mode' => $this->tinyInteger(2),
            'enter_year' => $this->string(4),
            'specialty_id' => $this->integer(),
            'rup_id' => $this->integer()
        ]);

        $this->addForeignKey('fk-group-specialty_id-specialty-id', $this->tableName, 'specialty_id', '{{%specialty}}', 'id', 'SET NULL');
        $this->addForeignKey('fk-group-rup_id-rup-id', $this->tableName, 'rup_id', '{{%rup}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
