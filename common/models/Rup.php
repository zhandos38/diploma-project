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
 * @property int|null $direction
 * @property int|null $education
 *
 * @property Group[] $groups
 * @property Specialty $specialty
 * @property RupSubject[] $rupSubjects
 */
class Rup extends \yii\db\ActiveRecord
{
    const MODE_DAY = 1;
    const MODE_EVENING = 0;

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
            [['specialty_id', 'degree', 'year', 'mode', 'direction', 'education'], 'integer'],
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
            'specialty_id' => 'Спецаиальность',
            'language' => 'Язык',
            'degree' => 'Степень',
            'year' => 'Год',
            'mode' => 'Форма обучения',
            'direction' => 'Направление подготовки',
            'education' => 'Образование',
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

    public static function getModes()
    {
        return [
            self::MODE_DAY => 'Дневная форма',
            self::MODE_EVENING => 'Вечерняя форма',
        ];
    }

    public function getMode()
    {
        return ArrayHelper::getValue(self::getModes(), $this->mode);
    }
}
