<?php
/**
 * Created by Navatech.
 * @project food
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    4/3/2021
 * @time    9:49 AM
 */

namespace frontend\controllers;
use yii\web\Controller;

class BookTableController extends Controller {
		public function actionIndex(){
			return $this->render('index');
		}
}
