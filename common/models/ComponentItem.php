<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "component_item".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $component_id
 *
 * @property Component $component
 */
class ComponentItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'component_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['component_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['component_id'], 'exist', 'skipOnError' => true, 'targetClass' => Component::className(), 'targetAttribute' => ['component_id' => 'id']],
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
            'component_id' => 'Компонент',
        ];
    }

    /**
     * Gets query for [[Component]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComponent()
    {
        return $this->hasOne(Component::className(), ['id' => 'component_id']);
    }
}
