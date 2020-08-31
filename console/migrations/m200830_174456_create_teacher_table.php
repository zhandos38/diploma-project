<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lecture}}`.
 */
class m200830_174456_create_teacher_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teacher}}', [
            'id' => $this->primaryKey(),
            'surname' => $this->string(),
            'name' => $this->string(),
            'patronymic' => $this->string(),
            'degree' => $this->tinyInteger(),
            'degree_extra' => $this->tinyInteger(),
            'is_head' => $this->boolean(),
            'is_pps' => $this->boolean(),
            'state' => $this->float()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lecture}}');
    }
}
