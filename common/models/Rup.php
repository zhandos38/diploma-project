<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "rup".
 *
 * @property int $id
 * @property int|null $specialty_id
 * @property string|null $language
 * @property int|null $degree
 * @property int|null $year
 * @property int|null $mode
 * @property int|null $direction_id
 * @property int|null $education_id
 * @property int|null $user_id
 *
 * @property Group[] $groups
 * @property Specialty $specialty
 * @property RupSubject[] $rupSubjects
 */
class Rup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rup';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['specialty_id', 'degree', 'year', 'mode', 'user_id'], 'integer'],
            [['language'], 'string', 'max' => 2],
            [['specialty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specialty::className(), 'targetAttribute' => ['specialty_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'specialty_id' => 'Образовательная программа ',
            'language' => 'Язык',
            'degree' => 'Уровень обучения',
            'year' => 'Начало обучения',
            'mode' => 'Форма обучения'
        ];
    }

    /**
     * Gets query for [[Groups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['rup_id' => 'id']);
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
     * Gets query for [[RupSubjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRupSubjects()
    {
        return $this->hasMany(RupSubject::className(), ['rup_id' => 'id']);
    }
}
