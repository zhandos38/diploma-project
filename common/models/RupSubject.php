<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "rup_subject".
 *
 * @property int $id
 * @property int|null $rup_id
 * @property int|null $subject_id
 * @property int|null $component_item_id
 * @property int|null $module_item_id
 * @property string|null $code
 * @property int|null $lang
 * @property int|null $semester
 * @property int|null $amount_lecture
 * @property int|null $amount_practice
 * @property int|null $amount_lab
 * @property float|null $amount_extra
 * @property float|null $amount_srop
 * @property int|null $is_course_work
 * @property int|null $is_gos
 * @property int|null $is_exam
 * @property int|null $is_exam_diff
 *
 * @property Rup $rup
 * @property Subject $subject
 * @property TeachersLoad[] $teachersLoads
 * @property Component $componentItem
 * @property Module $moduleItem
 *
 */
class RupSubject extends \yii\db\ActiveRecord
{
    public $component_id;
    public $module_id;

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
            [['rup_id', 'subject_id', 'semester', 'amount_lecture', 'amount_practice', 'amount_lab', 'lang', 'component_id', 'component_item_id', 'module_id', 'module_item_id'], 'integer'],
            ['code', 'string'],
            [['amount_extra', 'amount_srop'], 'number'],
            [['rup_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rup::className(), 'targetAttribute' => ['rup_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],

            [['component_item_id', 'module_item_id', 'amount_lecture', 'amount_practice', 'amount_lab', 'amount_extra', 'amount_srop'], 'required'],
            [['is_course_work', 'is_gos', 'is_exam', 'is_exam_diff'], 'boolean'],
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
            'component_id' => 'Цикл',
            'component_item_id' => 'Подцикл',
            'module_id' => 'Модуль',
            'module_item_id' => 'Подмодуль',
            'lang' => 'Язык',
            'semester' => 'Семестр',
            'amount_lecture' => 'Кол-во часов лекции',
            'amount_practice' => 'Кол-во часов практических занятий',
            'amount_lab' => 'Кол-во часов лабораторных',
            'amount_extra' => 'Кол-во часов внеаудиторные',
            'amount_srop' => 'Кол-во часов СРОП',
            'is_course_work' => 'Курсовая работа/Проект',
            'is_gos' => 'Гос. экзамен',
            'is_exam' => 'Экзамен',
            'is_exam_diff' => 'Дифф. зачет',
            'code' => 'Код дисциплины'
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

    public static function getSemesterStatic($semester)
    {
        $course = 0;
        $semester = (int)$semester;
        if ($semester === 1 || $semester === 2) {
            $course = 1;
        } else if ($semester === 3 || $semester === 4) {
            $course = 2;
        } else if ($semester === 5 || $semester === 6) {
            $course = 3;
        } else if ($semester === 7 || $semester === 8) {
            $course = 4;
        }

        return $course;
    }

    public function getSemester()
    {
        $course = 0;
        $this->semester = (int)$this->semester;
        if ($this->semester === 1 || $this->semester === 2) {
            $course = 1;
        } else if ($this->semester === 3 || $this->semester === 4) {
            $course = 2;
        } else if ($this->semester === 5 || $this->semester === 6) {
            $course = 3;
        } else if ($this->semester === 7 || $this->semester === 8) {
            $course = 4;
        }

        return $course;
    }

    public static function getLanguages()
    {
        return [
            0 => 'I',
            1 => 'II',
            2 => 'III'
        ];
    }

    public function getLanguage()
    {
        return ArrayHelper::getValue(self::getLanguages(), $this->lang);
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
