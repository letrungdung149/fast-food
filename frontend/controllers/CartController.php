<?php
/**
 * Created by Navatech.
 * @project lam_lai
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    23/2/2021
 * @time    4:50 PM
 */

namespace frontend\controllers;
use common\models\Invoice;
use common\models\InvoiceFood;
use frontend\models\CheckoutForm;
use Yii;
use yii\web\Controller;

class CartController extends Controller {
  public function actionIndex(){
    return $this->render('index');
  }
  public function actionViewCart($id = null){
  	if ($id != null){
		$invoice = Invoice::findOne($id);
    }else{
  		$invoice =Invoice::findOne(['status'=>Invoice::STATUS_DRAFT]);
    }
  	$invoice_food =InvoiceFood::find()->where(['invoice_id'=>$invoice->id])->all();
  	return $this->render('view-cart',[
  		'models'=>$invoice_food,
	    'invoice'=>$invoice
    ]);
  }
  public function actionCheckOut(){
  	$invoice =Invoice::find()->andWhere([
  		'user_id'=>\Yii::$app->user->identity->id,
		'status'=>Invoice::STATUS_DRAFT,
    ])->one();
	$invoice_food =InvoiceFood::find()->where(['invoice_id'=>$invoice->id])->all();
	$model = new CheckoutForm();
	if ($model->load(\Yii::$app->request->post())){
		if (!$invoice){
			Yii::$app->session->setFlash('danger','nothing');
			return $this->render('check-out',[
				'model'=> $model,
				'invoice_food'=>$invoice_food,
			]);
		}
		if ($model->checkOut($invoice->id)){
			Yii::$app->session->setFlash('success','ok');
			return $this->redirect(['site/index']);
		}
	}
	return $this->render('check-out',[
		'model'=>$model,
		'invoice_food'=>$invoice_food,
	]);
  }

}
