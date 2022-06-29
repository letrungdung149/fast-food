<?php

/**
 * Created by Navatech.
 * @project Default (Template) Project
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    26/2/2021
 * @time    10:42 AM
 */

/* @var $this \yii\web\View */
/** @var Cart $invoice */

use frontend\widgets\Cart;
use yii\helpers\Url;

?>
<div class="cart-item">
	<div class="cart-mail"><a href="#"><i class="flaticon-shopping-cart"></i><span><?=$invoice->quantity?></span></a></div>
	<p><a href="#">My cart<span>$<?= number_format($invoice->total) ?></span></a></p>
	<div class="cart-item-hover">
		<div class="cart-item-list">
			<img src="img/index/cart-item-1.jpg" alt="" />
			<a href="#"><h3>Beats Classic Headphone</h3></a>
			<b><a href="#">X</a></b>
			<p>$88.00 <del>$120.00</del></p>
		</div>
		<div class="border"></div>
		<div class="cart-total">
			<h6>Total Price</h6> <p>$178.00</p><div class="clearfix"></div>
			<a href="<?= Url::to(['cart/view-cart'])?>" class="cart-view">View all</a>
			<a href="<?=Url::to('index.php?r=cart%2Fcheck-out')?>" class="cart-checkout">Check out</a>
		</div>
	</div>
</div>
