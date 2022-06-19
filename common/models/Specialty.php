<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "specialty".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property int|null $specialty_group_id
 *
 * @property Group[] $groups
 * @property Rup[] $rups
 * @property SpecialtyGroup $specialtyGroup
 */
class Specialty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'specialty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['specialty_group_id', 'integer'],
            [['name', 'code'], 'string', 'max' => 255],
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
            'code' => 'Код',
            'specialty_group_id' => 'Группа',
        ];
    }

    /**
     * Gets query for [[Groups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['specialty_id' => 'id']);
    }

    /**
     * Gets query for [[Rups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRups()
    {
        return $this->hasMany(Rup::className(), ['specialty_id' => 'id']);
    }

    public function getSpecialtyGroup()
    {
        return $this->hasOne(SpecialtyGroup::className(), ['id' => 'specialty_group_id']);
    }
}
