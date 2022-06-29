<?php

/**
 * Created by Navatech.
 * @project Default (Template) Project
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    1/3/2021
 * @time    10:21 AM
 */

/* @var $this \yii\web\View */
?>
<?php

/**
 * Created by Navatech.
 * @project Default (Template) Project
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    23/2/2021
 * @time    4:53 PM
 */

/* @var $this \yii\web\View */
/** @var CartController $models */
/** @var CartController $invoice */

use common\models\Invoice;
use frontend\controllers\CartController;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<fieldset class="cart-tab">
	<div class="col-md-12 element-table">
		<div class="row">
			<table>
				<thead>
				<tr>
					<th>food</th>
					<th>Price</th>
					<th class="text-center">Quantity</th>
					<th class="text-center">Sub-total</th>
					<th></th>
				</tr>
				</thead>

				<tbody>
				<?php
				$tortal = 0;
				foreach ($models as $model){
					$tortal += $model->amount;
					?>
					<tr data-id="<?=$model->id?>">
						<td class="width">
							<div class="image">
								<img src="<?=$model->food->image?>" alt="" class="img-responsive" style="max-width: 150px">
								<p><?= $model->food->name?></p>
							</div>
						</td>
						<td class="cart-price"><?=number_format($model->food->price)?> VNĐ</td>
						<td class="text-center">
							<p>x<?=$model->quantity?></p>
						</td>
						<td class="text-center"><?=number_format($model->amount)?> VNĐ</td>
						<?php if($invoice->status == Invoice::STATUS_DRAFT){?>
							<td><a name="remove"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></td>
						<?php } ?>
					</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="clearfix"></div>
	<?php if($invoice->status == Invoice::STATUS_DRAFT) {?>
		<div class="shp-cart-btn">
			<a href="#" class="cart-btn">Clear shopping cart</a>
		</div>
		<div class="pull-right">
			<a href="<?=Url::to(['site/index'])?>" class="shp-btn">Continue shopping</a>
		</div>
	<?php } ?>
	<div class="clearfix"></div>
	<div class="col-md-12 shp-checkout checkout pay-faq">
		<h2>Shopping cart Total</h2>
		<div class="element-table">
			<table class="text-uppercase">
				<tbody>
				<tr>
					<td><b>Total</b></td>
					<td class="total text-right"><?=number_format($tortal)?> VNĐ</td>
				</tr>
				</tbody></table>
		</div>
		<?php if($invoice->status == Invoice::STATUS_DRAFT){?>
			<a class="next shp-btn pull-right" href="<?=Url::to(['cart/check-out'])?>">Process to checkout</a>
		<?php }?>
	</div>
	<div class="clearfix"></div>
</fieldset>
<?php
$this->registerJs("
	$(document).on('click','a[name=remove]',function(){
	var id = $(this).closest('tr').attr('data-id');
		$.ajax({
			type: \"POST\",
			cache: false,
			url: '". Url::to(['/ajax/remove-to-cart/']) . "&id='+id,
			dataType:\"json\",
			success:function(response){
				if(response.error === 1){
					alert(response.message);
				} else {
					location.reload();
				}
			}
		});
	});
	
	$(document).on('click','.shp-cart-btn a[class=cart-btn]',function(){
		  var r = confirm(\"Bạn muốn xoá tất cả giỏ hàng?\");
		  if (r == true) {
		    $.ajax({
				type: \"POST\",
				cache: false,
				url: '". Url::to(['/ajax/remove-to-cart'])."?type=2',
				dataType:\"json\",
				success:function(response){
					if(response.error === 1){
						alert(response.message);
					} else {
						location.reload();
					}
				}
			});
		  }
	});
	
");


?>
