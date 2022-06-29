<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "invoice_table".
 *
 * @property int $id
 * @property int $invoice_id
 * @property int $table_id
 * @property TableName $table_name
 * @property InvoiceTable[] $invoiceTable
 * @property Invoice $invoice
 */
class InvoiceTable extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice_table';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['invoice_id', 'table_id'], 'integer'],
//            [['invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['invoice_id' => 'id']],
//            [['table_id'], 'exist', 'skipOnError' => true, 'targetClass' => TableName::className(), 'targetAttribute' => ['table_id' => 'id']],
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
            'table_id' => 'Table ID',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Invoice]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['id' => 'invoice_id']);
    }

    /**
     * Gets query for [[Table]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTable()
    {
        return $this->hasOne(TableName::className(), ['id' => 'table_id']);
    }
}
