<?php

namespace frontend\models;

use yii\base\Model;

class CheckoutTable extends Model
{
	public $id;
	public $table_id;
	public $date;
	public $time;
	public $people;
	public function rules()
	{
		return [
			[['invoice_id', 'table_id', 'price'], 'required'],
			[['invoice_id', 'table_id', 'price'], 'integer'],
		];
	}
	public function Checkout(){

	}
}
