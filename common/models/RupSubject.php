<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rup_subject".
 *
 * @property int $id
 * @property int|null $rup_id
 * @property int|null $subject_id
 * @property int|null $semester
 * @property int|null $amount_lecture
 * @property int|null $amount_practice
 * @property int|null $amount_lab
 * @property int|null $is_course_work
 * @property int|null $is_gos
 * @property int|null $is_exam
 *
 * @property Rup $rup
 * @property Subject $subject
 * @property TeachersLoad[] $teachersLoads
 */
class RupSubject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rup_subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rup_id', 'subject_id', 'semester', 'amount_lecture', 'amount_practice', 'amount_lab', 'is_course_work', 'is_gos', 'is_exam'], 'integer'],
            [['rup_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rup::className(), 'targetAttribute' => ['rup_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rup_id' => 'РУП',
            'subject_id' => 'Дисциплина',
            'semester' => 'Семестр',
            'amount_lecture' => 'Кол-во лекции',
            'amount_practice' => 'Кол-во практики',
            'amount_lab' => 'Кол-во лабораторных',
            'is_course_work' => 'Курсовая работа',
            'is_gos' => 'Гос',
            'is_exam' => 'Экзамен',
        ];
    }

    /**
     * Gets query for [[Rup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRup()
    {
        return $this->hasOne(Rup::className(), ['id' => 'rup_id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    /**
     * Gets query for [[TeachersLoads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeachersLoads()
    {
        return $this->hasMany(TeachersLoad::className(), ['rup_subject_id' => 'id']);
    }
}
