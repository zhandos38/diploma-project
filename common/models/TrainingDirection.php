<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "training_direction".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 */
class TrainingDirection extends \yii\db\ActiveRecord
{
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
        ];
    }
}
