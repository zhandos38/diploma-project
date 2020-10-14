<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

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
 * @property string|null $address
 * @property int|null $user_id
 * @property int|null $social_status
 *
 * @property Group $group
 */
class Student extends \yii\db\ActiveRecord
{
    const SOCIAL_STATUS_LARGE_FAMILY = 0;
    const SOCIAL_STATUS_ORPHAN = 1;
    const SOCIAL_STATUS_HALF_ORPHAN = 2;
    const SOCIAL_STATUS_SPECIAL = 3;
    const SOCIAL_STATUS_SPECIAL_PARENTS = 4;

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
            [['group_id', 'social_status'], 'integer'],
            [['surname', 'name', 'patronymic', 'address'], 'string', 'max' => 255],
            [['phone', 'phone_parent', 'iin'], 'string', 'max' => 20],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],

            [['surname', 'name', 'group_id', 'iin'], 'required']
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
            'patronymic' => 'Отчетсво',
            'group_id' => 'Группа',
            'phone' => 'Телефон',
            'phone_parent' => 'Телефон родителей',
            'iin' => 'ИИН',
            'address' => 'Адрес',
            'social_status' => 'Социальное положение'
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

    public static function getSocialStatuses()
    {
        return [
            self::SOCIAL_STATUS_LARGE_FAMILY => 'Многодетная семья',
            self::SOCIAL_STATUS_ORPHAN => 'Сирота',
            self::SOCIAL_STATUS_HALF_ORPHAN => 'Полу сирота',
            self::SOCIAL_STATUS_SPECIAL => 'Лица с особыми потребностями',
            self::SOCIAL_STATUS_SPECIAL_PARENTS => 'Родители с особыми потребностями'
        ];
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getSocialStatus()
    {
        return ArrayHelper::getValue(self::getSocialStatuses(), $this->social_status);
    }
}
