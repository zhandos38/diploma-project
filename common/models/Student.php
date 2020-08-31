<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string|null $surname
 * @property string|null $name
 * @property string|null $patronymic
 * @property int|null $group_id
 * @property string|null $phone
 * @property string|null $phone_parent
 * @property string|null $iin
 *
 * @property Group $group
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id'], 'integer'],
            [['surname', 'name', 'patronymic'], 'string', 'max' => 255],
            [['phone', 'phone_parent', 'iin'], 'string', 'max' => 20],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
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
            'name' => 'Наименование',
            'patronymic' => 'Отчетсво',
            'group_id' => 'Группа',
            'phone' => 'Телефон',
            'phone_parent' => 'Телефон родителей',
            'iin' => 'ИИН',
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
}
