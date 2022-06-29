<?php

namespace frontend\models;

use common\models\Info;
use common\models\Invoice;
use yii\base\Model;
use function GuzzleHttp\Psr7\_parse_request_uri;

class CheckoutForm extends Model
{
	public $id;
	public $invoice_id;
	public $full_name;
	public $email;
	public $phone;
	public $address;
	public function rules()
	{
		return [
			[['invoice_id', 'created_at', 'updated_at'], 'integer'],
			[['full_name', 'email', 'created_at', 'updated_at'], 'required'],
			[['full_name', 'address', 'phone', 'email'], 'string', 'max' => 255],
		];
	}
	public function checkOut($invoice_id){
		$invoice = Invoice::findOne(['id'=>$invoice_id]);
		$invoice->updateAttributes([
			'status'=>'pending'
		]);
		$info = new Info();
		$info->invoice_id =$invoice->id;
		$info->full_name = $this->full_name;
		$info->email = $this->email;
		$info->phone = $this->phone;
		$info->address = $this->address;
		$info->created_at = time();
		$info->updated_at = time();
		$info->save();

		// TODO create info
		return true;
	}
}
