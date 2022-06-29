<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "table_name".
 *
 * @property int $id
 * @property int $room_id
 * @property string $name
 * @property string $type
 * @property int $price
 * @property string $description
 * @property string $image
 * @property int $person
 * @property string $date
 * @property int $time
 * @property InvoiceTable[] $invoiceTables
 * @property Room $room
 * @property string $status
 */
class TableName extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'table_name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id', 'name', 'date','time','person', 'price', 'description', 'image'], 'required'],
            [['room_id', 'price'], 'integer'],
            [['description', 'image'], 'string'],
            [['name', 'type'], 'string', 'max' => 255],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_id' => 'Room ID',
            'name' => 'Name',
            'price' => 'Price',
	        'date' =>'Date',
	        'time' =>'Time',
	        'person'=>'Person',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[InvoiceTables]].
     *
     * @return ActiveQuery
     */
    public function getInvoiceTables()
    {
        return $this->hasMany(InvoiceTable::className(), ['table_id' => 'id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }
}
