<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property int|null $component_item_id
 * @property int|null $module_item_id
 * @property string|null $name
 * @property int|null $is_practice
 * @property int|null $user_id
 * @property boolean|null $is_repeat
 *
 * @property RupSubject[] $rupSubjects
 * @property Component $componentItem
 * @property Module $moduleItem
 */
class Subject extends \yii\db\ActiveRecord
{
    public $component_id;
    public $module_id;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['component_item_id', 'module_item_id', 'is_practice', 'user_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['component_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => ComponentItem::className(), 'targetAttribute' => ['component_item_id' => 'id']],
            [['module_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => ModuleItem::className(), 'targetAttribute' => ['module_item_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],

            [['name'], 'required'],
            ['is_repeat', 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'component_id' => 'Цикл',
            'component_item_id' => 'Подциклы',
            'module_id' => 'Модуль',
            'module_item_id' => 'Подмодуль',
            'name' => 'Наименование',
            'code' => 'Код',
            'is_practice' => 'Практика',
            'is_repeat' => 'Повторяющийся предмет',
        ];
    }

    /**
     * Gets query for [[RupSubjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRupSubjects()
    {
        return $this->hasMany(RupSubject::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[ComponentItem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComponentItem()
    {
        return $this->hasOne(ComponentItem::className(), ['id' => 'component_item_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModuleItem()
    {
        return $this->hasOne(ModuleItem::className(), ['id' => 'module_item_id']);
    }
}
