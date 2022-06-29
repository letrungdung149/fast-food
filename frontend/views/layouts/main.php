<?php

/* @var $this \yii\web\View */
/* @var $content string */
/** @var \frontend\controllers\LayoutsController $food */

use frontend\assets\AppAsset;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">

<head>
	<?php $this->head() ?>
	<script src="common/js/jquery.js"></script>
	<script src="common/js/jquery-migrate-1.1.1.js"></script>
	<script src="common/js/superfish.js"></script>
	<script src="common/js/jquery.easing.1.3.js"></script>
	<script src="common/js/sForm.js"></script>
	<script src="common/js/jquery.carouFredSel-6.1.0-packed.js"></script>
	<script src="common/js/tms-0.4.1.js"></script>
	<script>
		$(window).load(function () {
			$('.carousel1').carouFredSel({
				auto: false,
				prev: $(this).parent().find('.prev'),
				next: $(this).parent().find('.next'),
				width: 960,
				items: {
					visible: {
						min: 1,
						max: 4
					},
					height: 'auto',
					width: 240,
				},
				responsive: false,
				scroll: 1,
				mousewheel: false,
				swipe: {
					onMouse: false,
					onTouch: false
				}
			});
		});
	</script>
</head>
<body>
<?php $this->beginBody() ?>
<div class="main">
	<?=$this->render('header')?>
	<div class="content page1">
		<div class="container_12">
			<?=$content?>
		</div>
	</div>
</div>
<?=$this->render('footer')?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
