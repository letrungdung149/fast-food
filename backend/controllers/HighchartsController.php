<?php
/**
 * Created by Navatech.
 * @project fast-food
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    8/2/2021
 * @time    9:36 AM
 */

namespace backend\controllers;
use yii\web\Controller;

class HighchartsController extends Controller {
  public function actionIndex(){
  	return $this->render('index');
  }
}
