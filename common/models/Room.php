<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 *
 * @property TableName[] $tableNames
 */
class Room extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['name', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[TableNames]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTableNames()
    {
        return $this->hasMany(TableName::className(), ['room_id' => 'id']);
    }
}
