<?php
/**
 * Created by Navatech.
 * @project fast-food
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    22/1/2021
 * @time    11:43 PM
 */

namespace common\models;
use yii\db\ActiveRecord;
use yii2mod\cart\models\CartItemInterface;

class ProductModel extends ActiveRecord implements CartItemInterface {

}
