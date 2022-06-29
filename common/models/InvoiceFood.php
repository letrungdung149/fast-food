<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "invoice_food".
 *
 * @property int $id
 * @property int $invoice_id
 * @property int $food_id
 * @property int $quantity
 * @property int $amount
 * @property Food $food
 * @property Invoice $invoice
 * @property int $price
 * @property InvoiceFood[] $invoiceFood
 * @property Room $room
 */
class InvoiceFood extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice_food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['invoice_id', 'food_id', 'quantity'], 'required'],
            [['invoice_id', 'food_id', 'quantity','amount','price'], 'integer'],
//            [['food_id'], 'exist', 'skipOnError' => true, 'targetClass' => Food::className(), 'targetAttribute' => ['food_id' => 'id']],
            [['invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['invoice_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_id' => 'Invoice ID',
            'food_id' => 'Food ID',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * Gets query for [[Food]].
     *
     * @return ActiveQuery
     */
    public function getFood()
    {
        return $this->hasOne(Food::className(), ['id' => 'food_id']);
    }

    /**
     * Gets query for [[Invoice]].
     *
     * @return ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['id' => 'invoice_id']);
    }

}
