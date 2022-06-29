<?php
/**
 * Created by Navatech.
 * @project fast-food
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    20/1/2021
 * @time    11:16 PM
 */

namespace frontend\controllers;
use common\models\Food;
use yii\web\Controller;

class DetailController  extends  Controller {
   public function actionIndex($id){
   	$detail = Food::findOne($id);
   	  return $this->render('index',[
   	  	'detail'=>$detail
      ]);
   }
}
