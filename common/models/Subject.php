<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property int|null $component_id
 * @property int|null $subject_type_id
 * @property string|null $code
 * @property int|null $module_id
 * @property string|null $language
 * @property string|null $name
 * @property int|null $is_practice
 *
 * @property RupSubject[] $rupSubjects
 * @property Component $component
 * @property SubjectType $component0
 */
class Subject extends \yii\db\ActiveRecord
{
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
            [['component_id', 'subject_type_id', 'module_id', 'is_practice'], 'integer'],
            [['code', 'name'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 2],
            [['component_id'], 'exist', 'skipOnError' => true, 'targetClass' => Component::className(), 'targetAttribute' => ['component_id' => 'id']],
            [['component_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubjectType::className(), 'targetAttribute' => ['component_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'component_id' => 'Компонент',
            'subject_type_id' => 'Тип предмета',
            'code' => 'Код',
            'module_id' => 'Модуль',
            'language' => 'Язык',
            'name' => 'Наименование',
            'is_practice' => 'Практика',
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
     * Gets query for [[Component]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComponent()
    {
        return $this->hasOne(Component::className(), ['id' => 'component_id']);
    }

    /**
     * Gets query for [[Component0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComponent0()
    {
        return $this->hasOne(SubjectType::className(), ['id' => 'component_id']);
    }
}
