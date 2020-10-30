<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "module".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $number
 * @property integer|null $user_id
 *
 * @property ModuleItem $moduleItems
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'number'], 'string', 'max' => 255],

            ['name', 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'number' => 'Номер',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModuleItems()
    {
        return $this->hasMany(ModuleItem::className(), ['module_id' => 'id']);
    }
}
