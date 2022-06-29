<?php
/**
 * Created by Navatech.
 * @project food
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    3/3/2021
 * @time    3:02 PM
 */

namespace frontend\controllers;
use common\models\Food;
use yii\web\Controller;

class LayoutsController extends Controller {
	public function actionHeader(){
		$model = Food::find()->limit(10)->all();
		return $this->render('header',[
			'model'=>$model
		]);
	}
}
