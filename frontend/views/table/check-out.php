<?php

/**
 * Created by Navatech.
 * @project Default (Template) Project
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    4/3/2021
 * @time    3:38 PM
 */

/* @var $this \yii\web\View */
/* @var $model \frontend\models\CheckoutForm */
/* @var $invoice_food array|\yii\db\ActiveRecord[] */

use yii\widgets\ActiveForm;

?>
<div class="container" style="padding: 0px" >
	<div class="container product-table padd-80">
		<?php $form = ActiveForm::begin() ?>
		<div class="col-md-6">
			<div class="row checkout">
				<div class="col-md-12"><h2>Please fill your information</h2></div>
				<div class="col-md-6"><?= $form->field($model, 'full_name')->textInput() ?></div>
				<div class="col-md-6"><?= $form->field($model, 'address')->textInput() ?></div>
				<div class="col-md-6"><?= $form->field($model, 'phone')->textInput() ?></div>
				<div class="col-md-6"><?= $form->field($model, 'email')->textInput() ?></div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12 pay-faq">
				<div class="col-md-12 text-center" style="position:relative;top: 300px; right: 450px;">
					<button type="submit" class="coupon btn-bg" style="background: green;">Place order</button></div>
				<div class="clearfix"></div>
			</div>
		</div>
		<?php ActiveForm::end() ?>
		<div class="clearfix"></div>
	</div>
</div>
