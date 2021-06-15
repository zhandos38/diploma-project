<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string|null $surname
 * @property string|null $name
 * @property string|null $patronymic
 * @property int|null $degree
 * @property int|null $degree_extra
 * @property int|null $is_head
 * @property int|null $is_pps
 * @property int|null $user_id
 * @property float|null $state
 *
 * @property TeachersLoad[] $teachersLoads
 */
class Teacher extends \yii\db\ActiveRecord
{
    const BACHELOR = 0;
    const MASTER = 1;
    const DOCTOR = 2;
    const PROFESSOR = 3;
    const CANDIDATE = 4;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['degree', 'degree_extra', 'is_head', 'is_pps', 'user_id'], 'integer'],
            [['state'], 'number'],
            [['surname', 'name', 'patronymic'], 'string', 'max' => 255],
            [['name', 'surname', 'degree', 'state'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'degree' => 'Степень',
            'degree_extra' => 'Степень Доп.',
            'is_head' => 'Зав. кафедрой',
            'is_pps' => 'ППС',
            'state' => 'Ставка',
        ];
    }

    /**
     * Gets query for [[TeachersLoads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeachersLoads()
    {
        return $this->hasMany(TeachersLoad::className(), ['teacher_id' => 'id']);
    }

    public static function getDegrees() {
        return [
            self::MASTER => 'Магистр',
            self::DOCTOR => 'Доктор',
            self::PROFESSOR => 'Профессор',
            self::CANDIDATE => 'Кандидат наук'
        ];
    }

    public function getDegreeLabel() {
        return ArrayHelper::getValue(self::getDegrees(), $this->degree);
    }
}
