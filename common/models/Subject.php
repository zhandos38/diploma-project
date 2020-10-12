<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property int|null $component_id
 * @property int|null $subject_type_id
 * @property int|null $module_id
 * @property string|null $language
 * @property string|null $name
 * @property int|null $is_practice
 * @property int|null $user_id
 *
 * @property RupSubject[] $rupSubjects
 * @property Component $component
 * @property SubjectType $subjectType
 * @property Module $module
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
            [['component_id', 'subject_type_id', 'module_id', 'is_practice', 'user_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 2],
            [['component_id'], 'exist', 'skipOnError' => true, 'targetClass' => Component::className(), 'targetAttribute' => ['component_id' => 'id']],
            [['subject_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubjectType::className(), 'targetAttribute' => ['subject_type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],

            [['name', 'subject_type_id', 'component_id', 'module_id'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'component_id' => 'Тип компонента',
            'subject_type_id' => 'Тип дисциплины',
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
     * Gets query for [[SubjectType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectType()
    {
        return $this->hasOne(SubjectType::className(), ['id' => 'subject_type_id']);
    }

    public function getModule()
    {
        return $this->hasOne(Module::className(), ['id' => 'module_id']);
    }
}
