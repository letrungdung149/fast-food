<?php
/**
 * Created by Navatech.
 * @project lam_lai
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    24/2/2021
 * @time    8:45 AM
 */

namespace frontend\controllers;
use Codeception\Event\PrintResultEvent;
use common\models\Food;
use common\models\Invoice;
use common\models\InvoiceFood;
use common\models\InvoiceTable;
use common\models\TableName;
use frontend\widgets\Cart;
use Yii;

class AjaxController extends \yii\rest\Controller {
	public function actionRemoveToTable($id = null,$type = 0){
		if ($id != null){
			$invoice =Invoice::findOne([
				'status'=>Invoice::STATUS_DRAFT
			]);
			if ($type == 0){
				InvoiceTable::deleteAll([
					'invoice_id'=>$invoice->id,
					'id'=>$id,
				]);
				return [
					'error'=>0,
					'html' =>Cart::widget(),
					'message'=>'OK',
				];
			}elseif ($type ==1){
				InvoiceTable::deleteAll([
					'food_id'=>$id,
					'invoice_id'=>$invoice->id,
				]);
				return [
					'type'=>'1',
				];
			}
		}else{
			InvoiceTable::deleteAll();
			return [
				'error'=>0,
				'html'=>'',
				'message'=>'OK',
			];
		}
	}
	public function actionRemoveToCart($id = null,$type = 0){
		if ($id != null){
			$invoice =Invoice::findOne([
				'status'=>Invoice::STATUS_DRAFT
			]);
			if ($type == 0){
			  InvoiceFood::deleteAll([
			  	'invoice_id'=>$invoice->id,
				'id'=>$id,
			  ]);
			  return [
			  	'error'=>0,
				'html' =>Cart::widget(),
				'message'=>'OK',
			  ];
			}elseif ($type ==1){
			InvoiceFood::deleteAll([
				'food_id'=>$id,
				'invoice_id'=>$invoice->id,
			]);
			return [
				'type'=>'1',
			];
			}
		}else{
			InvoiceFood::deleteAll();
			return [
				'error'=>0,
				'html'=>'',
				'message'=>'OK',
			];
		}
	}

	public function actionAddToCart($id,$quantity =1) {
		$food = Food::findOne(['id'=>$id]);
		if (!Yii::$app->user->isGuest) {
			$user    = Yii::$app->user->identity;
			$invoice = Invoice::findOne([
				'user_id' => $user->id,
				'status'  => Invoice::STATUS_DRAFT,
			]);
			if ($invoice == null) {
				$invoice             = new Invoice();
				$invoice->user_id    = $user->id;
				$invoice->status     = Invoice::STATUS_DRAFT;
				$invoice->created_at = time();
				$invoice->token = rand(9999999,100000000);
				$invoice->notify     = 1;
				if ($invoice->save()){
					echo 'save';
				}else{
					echo '<pre>';
					print_r($invoice->errors);
					die;
				}
			}
			$invoice_food = InvoiceFood::findOne([
				'invoice_id' => $invoice->id,
				'food_id'    => $food->id,
			]);
			if ($invoice_food !== null) {
				$new_quantity = $invoice_food->quantity + $quantity;
				$new_amount   = $new_quantity * $invoice_food->price;
				$invoice_food->updateAttributes([
					'quantity' => $new_quantity,
					'amount'   => $new_amount,
				]);
				return $this->redirect('index.php?r=cart%2Fview-cart');
			} else {
				$invoice_food             = new InvoiceFood();
				$invoice_food->quantity   = $quantity;
				$invoice_food->price      = $food->price;
				$invoice_food->amount     = $food->price;
				$invoice_food->invoice_id = $invoice->id;
				$invoice_food->food_id    = $food->id;
				$invoice_food->save();
				return $this->redirect('index.php?r=cart%2Fview-cart');
			}
			return [
				'error'   => 0,
				'html'    => Cart::widget(),
				'message' => 'OK',
			];
		}else{
			return[
                'error'=>1,
				'message'=>'chua dang nhap',
			];
		}
	}
	public function actionAddTable($id){
		$table = TableName::findOne(['id'=>$id]);
		if (!Yii::$app->user->isGuest){
			$user =Yii::$app->user->identity;
			$invoice = Invoice::findOne([
				'user_id' => $user->id,
				'status'  => Invoice::STATUS_DRAFT,
			]);
			if ($invoice == null) {
				$invoice             = new Invoice();
				$invoice->user_id    = $user->id;
				$invoice->status     = Invoice::STATUS_DRAFT;
				$invoice->created_at = time();
				$invoice->token = rand(99999999,10000000000);
				$invoice->notify     = 1;
				$invoice->save();
			}
			$invoice_table = InvoiceTable::findOne([
				'invoice_id' => $invoice->id,
				'table_id'   => $table->id,
			]);
			if ($invoice_table === null){
				$invoice_table = new InvoiceTable();
				$invoice_table->invoice_id = $invoice->id;
				$invoice_table->table_id = $table->id;
				$invoice_table->save();
				return $this->redirect('index.php?r=table%2Fview-table');
			}else{
				echo '<pre>';
				print_r('co nguoi dat ban roi');
				die;
			}
		}else{
			return[
			 'error'=>1,
			 'message'=>'chua dang nhap',
			];
		}
	}
}
