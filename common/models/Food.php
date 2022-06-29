<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "food".
 *
 * @property int $id
 * @property string $name
 * @property int $menu_id
 * @property int $price
 * @property string $image
 * @property string $description
 *
 * @property Menu $menu
 * @property InvoiceFood[] $invoiceFoods
 */
class Food extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $qtt;
    public static function tableName()
    {
        return 'food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'menu_id', 'price', 'image', 'description'], 'required'],
            [['menu_id', 'price'], 'integer'],
            [['description'], 'string'],
	        [['image'],'file','extensions'=>'jpg,png,gif'],
            [['name'], 'string', 'max' => 255],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['menu_id' => 'id']],
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
            'menu_id' => 'Menu ID',
            'price' => 'Price',
            'image' => 'Image',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Menu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'menu_id']);
    }

    /**
     * Gets query for [[InvoiceFoods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceFoods()
    {
        return $this->hasMany(InvoiceFood::className(), ['food_id' => 'id']);
    }
}
