<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%columns}}`.
 */
class m201001_061428_add_user_id_column_to_columns_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%group}}', 'user_id', $this->integer());
        $this->addColumn('{{%student}}', 'user_id', $this->integer());
        $this->addColumn('{{%rup}}', 'user_id', $this->integer());
        $this->addColumn('{{%teacher}}', 'user_id', $this->integer());

        $this->addForeignKey('fk-group-user_id-user-id', '{{%group}}', 'user_id', '{{%user}}', 'id', 'SET NULL');
        $this->addForeignKey('fk-student-user_id-user-id', '{{%student}}', 'user_id', '{{%user}}', 'id', 'SET NULL');
        $this->addForeignKey('fk-rup-user_id-user-id', '{{%rup}}', 'user_id', '{{%user}}', 'id', 'SET NULL');
        $this->addForeignKey('fk-teacher-user_id-user-id', '{{%teacher}}', 'user_id', '{{%user}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%group}}', 'user_id');
        $this->dropColumn('{{%student}}', 'user_id');
        $this->dropColumn('{{%rup}}', 'user_id');
        $this->dropColumn('{{%teacher}}', 'user_id');
    }
}
