<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teachers_load".
 *
 * @property int $id
 * @property int|null $group_id
 * @property int|null $teacher_id
 * @property int|null $rup_subject_id
 * @property int|null $practice
 * @property int|null $course_work
 * @property float|null $exam
 * @property float|null $block
 * @property int|null $year
 * @property int|null $tutor_connection
 * @property int|null $diploma_leader
 * @property int|null $amount_lecture
 * @property int|null $amount_practice
 * @property int|null $amount_lab
 *
 * @property Group $group
 * @property RupSubject $rupSubject
 * @property Teacher $teacher
 */
class TeachersLoad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teachers_load';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'teacher_id', 'rup_subject_id', 'practice', 'course_work', 'year', 'tutor_connection', 'diploma_leader', 'amount_lecture', 'amount_practice', 'amount_lab'], 'integer'],
            [['exam', 'block'], 'number'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['rup_subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => RupSubject::className(), 'targetAttribute' => ['rup_subject_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Группы',
            'teacher_id' => 'Преподаватель',
            'rup_subject_id' => 'Дисциплина',
            'practice' => 'Практика',
            'course_work' => 'Курсы',
            'exam' => 'Экзамен',
            'block' => 'Блок',
            'year' => 'Год',
            'tutor_connection' => 'Тьютор',
            'diploma_leader' => 'Диплом лидер',
            'amount_lecture' => 'Лекция',
            'amount_practice' => 'Практика',
            'amount_lab' => 'Лабораторная',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

    /**
     * Gets query for [[RupSubject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRupSubject()
    {
        return $this->hasOne(RupSubject::className(), ['id' => 'rup_subject_id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }
}
