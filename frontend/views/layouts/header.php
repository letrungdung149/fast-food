<?php
/**
 * Created by Navatech.
 * @project fast-food
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    20/1/2021
 * @time    4:50 PM
 */

use frontend\controllers\CartController;
use frontend\widgets\Cart;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<script src="https://kit.fontawesome.com/c75efb11bf.js" crossorigin="anonymous"></script>
<header>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<div class="container_12">
		<div class="grid_12">
			<h1><a href="index.php"><img src="common/images/logo.png" alt=""></a></h1>
			<div class="menu_block">
				<nav>
					<ul class="sf-menu">
						<li class="current"><a href="index.php">Home</a></li>
						<li><a href="#">FOOD MENU</a></li>
						<li><a href="<?=Url::to(['table/index'])?>">book a table</a></li>
						<li><a href="#">Book</a></li>
						<?= Cart::widget()?>
					</ul>
					<div class="top-bar-list" style="position: relative;left: 650px;">
						<?= Html::csrfMetaTags() ?>
						<?php if (Yii::$app->user->identity) { ?>
							<p><b><a href="<?= Url::to([
										'user/settings/profile',
										'user_id' => Yii::$app->user->identity->id,
									]) ?>"><?= Yii::$app->user->identity->username ?></a></b>
								<b><a href="<?= Url::to(['/user/security/logout']) ?>" data-method="POST" >Thoái</a></b></p>
						<?php } else { ?>
							<p>
								<b><a href="<?=Url::to('index.php?r=user%2Fregistration%2Fregister')?>">Đăng Ký</a></b> or
								<b><a href="<?=Url::to('index.php?r=user%2Fsecurity%2Flogin')?>">Đăng nhập</a></b>
							</p>
						<?php } ?>
					</div>
				</nav>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</header>
<div class="container">
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<?php $form = ActiveForm::begin([
						'method' => 'post'
				]) ?>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Book Online</h4>
					</div>
					<div class="modal-body">
						<input type="number" id="quantity" name="ngay" min="1" max="100" style="width: 30%;" placeholder="choose person">
						<input type="number" id="quantity" name="so_nguoi" min="1" max="6" placeholder="choose date" style="width: 30%;">
						<input type="number" id="quantity" name="gio" min="1" max="100" style="width: 30%;" placeholder="choose time">
	<!--<input type="date" value="2017-06-01" style="width: 38%;">-->
	<!--<input type="time" id="appt" name="appt" style="width: 30%;">-->
					</div>
					<div class="modal-footer">
<!--						<button type="submit" class="btn btn-default" data-dismiss="modal" style="position: relative;right: 200px;background: green;">CHOOSE A TABLE NOW</button>-->
						<?= Html::submitButton('CHOOSE A TABLE NOW', ['class' => 'btn btn-success']) ?>
					</div>
				<?php $form = ActiveForm::end() ?>
			</div>

		</div>
	</div>
</div>
