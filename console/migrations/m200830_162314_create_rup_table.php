<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rup}}`.
 */
class m200830_162314_create_rup_table extends Migration
{
    public $tableName = '{{%rup}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'specialty_id' => $this->integer(),
            'language' => $this->string(2),
            'degree' => $this->tinyInteger(2),
            'year' => $this->tinyInteger(4),
            'mode' => $this->tinyInteger(2),
            'direction' => $this->tinyInteger(2),
            'education' => $this->integer()
        ]);

        $this->addForeignKey('fk-rup-specialty_id-specialty-id', $this->tableName, 'specialty_id', '{{%specialty}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
