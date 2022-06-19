<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "training_direction".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property int $degree
 */
class TrainingDirection extends \yii\db\ActiveRecord
{
    const DEGREE_BACHELOR = 0;
    const DEGREE_MASTER = 1;
    const DEGREE_DOCTOR = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training_direction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'string', 'max' => 255],
            ['degree', 'integer']
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
            'degree' => 'Код',
        ];
    }

    public static function getDegreeLabels()
    {
        return [
          self::DEGREE_BACHELOR => 'Бакалавриат',
          self::DEGREE_MASTER => 'Магистратура',
          self::DEGREE_DOCTOR => 'Докторантура',
        ];
    }

    public function getDegreeLabel()
    {
        return ArrayHelper::getValue(self::getDegreeLabels(), $this->degree);
    }
}
