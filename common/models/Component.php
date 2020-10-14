<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "component".
 *
 * @property int $id
 * @property string|null $name
 * @property integer|null $user_id
 *
 * @property Subject[] $subjects
 */
class Component extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'component';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['user_id', 'integer'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[Subjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['component_id' => 'id']);
    }

    public function getComponentItems()
    {
        return $this->hasMany(ComponentItem::className(), ['component_id' => 'id']);
    }
}
