<?php
/**
 * Created by Navatech.
 * @project food
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    3/3/2021
 * @time    9:34 AM
 */

namespace frontend\controllers;
use common\models\Invoice;
use common\models\InvoiceTable;
use common\models\TableName;
use frontend\models\CheckoutForm;
use Yii;
use yii\web\Controller;

class TableController extends Controller {
	public function actionIndex() {
		if(isset($_POST['so_nguoi']) && isset($_POST['ngay']) && isset($_POST['gio'])) {
			$so_nguoi = $_POST['so_nguoi'];
			$ngay = $_POST['ngay'];
			$gio = $_POST['gio'];
			$table = TableName::find()->where(['date' => $ngay, 'person' => $so_nguoi, 'time' => $gio, 'status' => 'empty'])->all();
		}
			return $this->render('index', [
				'table'=>$table,
			]);
		}
	public function actionViewTable($id = null){
		if ($id != null){
			$invoice = Invoice::findOne($id);
		}else{
			$invoice =Invoice::findOne(['status'=>Invoice::STATUS_DRAFT]);
		}
		$invoice_table =InvoiceTable::find()->where(['invoice_id'=>$invoice->id])->all();
		return $this->render('view-table',[
			'models'=>$invoice_table,
			'invoice'=>$invoice
		]);
	}
	public function actionCheckOut(){
		$invoice =Invoice::find()->andWhere([
			'user_id'=>\Yii::$app->user->identity->id,
			'status'=>Invoice::STATUS_DRAFT,
		])->one();
		$invoice_table =InvoiceTable::find()->where(['invoice_id'=>$invoice->id])->all();
		$model = new CheckoutForm();
		if ($model->load(\Yii::$app->request->post())){
			if (!$invoice){
				Yii::$app->session->setFlash('danger','nothing');
				return $this->render('check-out',[
					'model'=> $model,
					'invoice_table'=>$invoice_table,
				]);
			}
			if ($model->checkOut($invoice->id)){
				Yii::$app->session->setFlash('success','ok');
				return $this->redirect(['site/index']);
			}
		}
		return $this->render('check-out',[
			'model'=>$model,
			'invoice_table'=>$invoice_table,
		]);
	}
}
