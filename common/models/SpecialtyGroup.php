<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "specialty_group".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property integer|null $training_direction_id
 *
 * @property Specialty[] $specialties
 * @property TrainingDirection $trainingDirection
 */
class SpecialtyGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'specialty_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['training_direction_id'], 'integer'],
            [['code', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код',
            'name' => 'Наименование',
        ];
    }

    /**
     * Gets query for [[Specialties]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialties()
    {
        return $this->hasMany(Specialty::className(), ['specialty_group_id' => 'id']);
    }

    public function getTrainingDirection()
    {
        return $this->hasOne(TrainingDirection::className(), ['id' => 'training_direction_id']);
    }
}
