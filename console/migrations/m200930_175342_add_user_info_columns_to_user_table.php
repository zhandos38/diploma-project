<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m200930_175342_add_user_info_columns_to_user_table extends Migration
{
    public $tableName = '{{%user}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'name', $this->string()->after('username')->notNull());
        $this->addColumn($this->tableName, 'surname', $this->string()->after('name')->notNull());
        $this->addColumn($this->tableName, 'patronymic', $this->string()->after('surname')->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'name');
        $this->dropColumn($this->tableName, 'surname');
        $this->dropColumn($this->tableName, 'patronymic');
    }
}
