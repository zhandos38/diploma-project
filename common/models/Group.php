<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $language
 * @property int|null $degree
 * @property int|null $mode
 * @property string|null $enter_year
 * @property int|null $specialty_id
 * @property int|null $rup_id
 *
 * @property Rup $rup
 * @property Specialty $specialty
 * @property Student[] $students
 * @property TeachersLoad[] $teachersLoads
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['degree', 'mode', 'specialty_id', 'rup_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 2],
            [['enter_year'], 'string', 'max' => 4],
            [['rup_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rup::className(), 'targetAttribute' => ['rup_id' => 'id']],
            [['specialty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specialty::className(), 'targetAttribute' => ['specialty_id' => 'id']],

            [['name', 'language', 'degree', 'enter_year', 'speciality_id'], 'required']
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
            'language' => 'Язык обучение',
            'degree' => 'Степень',
            'mode' => 'Форма обучение',
            'enter_year' => 'Начальный год',
            'specialty_id' => 'Специальность',
            'rup_id' => 'РУП',
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
     * Gets query for [[Specialty]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialty()
    {
        return $this->hasOne(Specialty::className(), ['id' => 'specialty_id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['group_id' => 'id']);
    }

    /**
     * Gets query for [[TeachersLoads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeachersLoads()
    {
        return $this->hasMany(TeachersLoad::className(), ['group_id' => 'id']);
    }
}
