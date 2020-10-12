<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "module_item".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $module_id
 *
 * @property Module $module
 */
class ModuleItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['module_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['module_id'], 'exist', 'skipOnError' => true, 'targetClass' => Module::className(), 'targetAttribute' => ['module_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'module_id' => 'Module ID',
        ];
    }

    /**
     * Gets query for [[Module]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(Module::className(), ['id' => 'module_id']);
    }
}
