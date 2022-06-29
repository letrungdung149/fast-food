<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property string $total
 * @property string $status
 * @property string $token
 * @property int $created_at
 * @property int $notify
 * @property int $price
 * @property int $user_id
 * @property int $quantity
 * @property InvoiceFood[] $invoiceFoods
 * @property InvoiceTable[] $invoiceTables
 */
class Invoice extends \yii\db\ActiveRecord
{
	const  STATUS_DRAFT     = 'draft';

	const  STATUS_PENDING   = 'pending';

	const  STATUS_COMPLETED = 'completed';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'notify','user_id'], 'required'],
            [[ 'created_at', 'notify','user_id'], 'integer'],
            [['status'], 'string'],
            [['total'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'total' => 'Total',
            'status' => 'Status',
            'token' => 'Token',
            'created_at' => 'Created At',
            'notify' => 'Notify',
        ];
    }

    /**
     * Gets query for [[InvoiceFoods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceFoods()
    {
        return $this->hasMany(InvoiceFood::className(), ['invoice_id' => 'id']);
    }
	public function getInvoiceFood(){
		return $this->hasMany(InvoiceFood::class,['invoice_id'=>'id']);
	}
    /**
     * Gets query for [[InvoiceTables]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceTables()
    {
        return $this->hasMany(InvoiceTable::className(), ['invoice_id' => 'id']);
    }
	public function updateTotal(){
		$total = 0;
		foreach ($this->invoiceFoods as $invoiceFood){
			$total += $invoiceFood->amount;
		}
		$this->updateAttributes([
			'total' => $total,
			'quantity'=>$this->getInvoiceFood()->count(),
		]);
	}
}
