<?php
/**
 * Created by Navatech.
 * @project fast-food
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    1/2/2021
 * @time    2:57 PM
 */

namespace frontend\controllers;
use common\models\Food;
use yii\web\Controller;

class FoodController extends Controller {
   public function actionIndex()
   {
   	 #code ...
   }
   public function actionView($slug)
   {
   	$model = Food::findOne(['slug'=>$slug]);
   	return $this->render('view',[
   		'model'=>$model,
    ]);
   }
}
