<?php

/**
 * Created by Navatech.
 * @project Default (Template) Project
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    4/3/2021
 * @time    9:50 AM
 */

/* @var $this \yii\web\View */

use yii\helpers\Html;

?>
<div class="content">
	<div class="container_12">
		<div class="grid_5">
			<?php foreach ($table as $item){?>
				<h2><?=$item->room_id?></h2>
				<img src="<?=$item->image?>" alt="" class="img_inner" style="height: 250px; width: 250px;">
				<div class="content" style="position: relative; bottom: 220px; left: 263px;">
					<h2><?=$item->name?></h2>
					<p class="col1" style=""><?=$item->description?></p>
					<?php echo Html::a('Add  to cart',['table/add-cart','id'=>$item->id]);?>
				</div>
			<?php }?>
		</div>
		<div class="clear"></div>
	</div>
</div>

