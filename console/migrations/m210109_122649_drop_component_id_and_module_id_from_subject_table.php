<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%component_id_and_module_id_from_subject}}`.
 */
class m210109_122649_drop_component_id_and_module_id_from_subject_table extends Migration
{
    public $tableName = '{{%subject}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn($this->tableName, 'component_id');
        $this->dropColumn($this->tableName, 'module_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210109_122649_drop_component_id_and_module_id_from_subject_table cannot be reverted.\n";

        return false;
    }
}
