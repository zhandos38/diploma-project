<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "specialty".
 *
 * @property int $id
 * @property string|null $name
 * @property integer|null $user_id
 *
 * @property Group[] $groups
 * @property Rup[] $rups
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
            ['user_id', 'integer'],
            [['name'], 'string', 'max' => 255],
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
}
