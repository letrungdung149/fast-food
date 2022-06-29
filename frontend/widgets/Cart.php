<?php
/**
 * Created by FES VPN.
 * @project mobileshop-fesdev-net
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    12/7/2020
 * @time    11:02 AM
 */

namespace frontend\widgets;

use common\models\Invoice;
use Yii;
use yii\base\Widget;

class Cart extends Widget {

	public function run() {
		$invoice =null;
		if (!Yii::$app->user->isGuest){
			$user = Yii::$app->user->getIdentity();
			$invoice = Invoice::find()->andWhere([
				'user_id'=>$user->id,
				'status'=>Invoice::STATUS_DRAFT,
			])->one();
		}
		if ($invoice === null){
			$invoice = new Invoice();
			$invoice->total = 0;
			$invoice->quantity = 0;
		}
		return $this->render('cart',[
			'invoice'=>$invoice,
		]);
	}
}
