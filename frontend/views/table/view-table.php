<?php

/**
 * Created by Navatech.
 * @project Default (Template) Project
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    4/3/2021
 * @time    11:41 AM
 */

/* @var $this \yii\web\View */
/* @var $models array|\yii\db\ActiveRecord[] */
/* @var $invoice \common\models\Invoice|null */

use common\models\Invoice;
use yii\helpers\Url;

?>
<fieldset class="cart-tab">
	<div class="col-md-12 element-table">
		<div class="row">
			<h1 style="color: red;">Reservation</h1>
			<table>
				<thead>
				<tr>
					<th>Room's name</th>
					<th>Table's name</th>
					<th class="text-center">Price</th>
					<th class="text-center">Sub-total</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($models as $model){
					?>
					<tr data-id="<?=$model->id?>">
						<td class="width">
							<div class="image">
								<img src="<?=$model->table->image?>" alt="" class="img-responsive" style="max-width: 150px">
								<p><?= $model->table->room->name?></p>
							</div>
						</td>
						<td class="text-center">
							<p><?=$model->table->name?></p>
						</td>
						<td class="cart-price"><?=number_format($model->table->price)?> VNĐ</td>
						<td class="cart-price"><?=number_format($model->table->price)?> VNĐ</td>
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
					<td class="total text-right">1 VNĐ</td>
				</tr>
				</tbody>
			</table>
		</div>
		<?php if($invoice->status == Invoice::STATUS_DRAFT){?>
			<a class="next shp-btn pull-right" href="<?=Url::to(['table/check-out'])?>">Process to checkout</a>
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
			url: '". Url::to(['/ajax/remove-to-table/']) . "&id='+id,
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
				url: '". Url::to(['/ajax/remove-to-table'])."?type=2',
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
