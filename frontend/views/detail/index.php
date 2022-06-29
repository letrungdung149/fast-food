<?php
/** @var \frontend\controllers\DetailController $detail */

use yii\helpers\Html;
use yii\helpers\Url;

$this->registerJs('
$.ajax({
		type: "POST",
		cache: false,
		url: "' . Url::to(['cart/add-to-cart']) . '?id="+th.attr("data-id")+"&type=phone",
		dataType:"json",
		success:function(response){
			if(response.error === 1){
				alert(response.message);
			} else {
				$(".fas fa-shopping-cart").html(response.html);
			}
		}
	});')
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Gourmet Traditional Restaurant | News</title>
	<meta charset="utf-8">
	<link rel="icon" href="images/favicon.ico">
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery.js"></script>
	<script src="js/jquery-migrate-1.1.1.js"></script>
	<script src="js/superfish.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/sForm.js"></script>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<link rel="stylesheet" media="screen" href="css/ie.css">
	<![endif]-->
</head>
<body>
<div class="main">
	<div class="content">
		<div class="container_12">
			<div class="grid_7">
				<h2 class="head2"></h2>
				<div class="news"> <img src="<?=$detail->image?>" alt="" class="img_inner fleft" style="width: 50%">
					<div class="extra_wrapper" style="height: 200px">
						<div class="col1" style="height: 40px; position: relative; top: -30px;"><h2>Name:<?=$detail->name?></h2></div>
						<div class="col1" style="height: 40px; position: relative; top: -30px;"><h2>Menu's name:LUNCH</h2></div>
						<div class="col1" style="height: 40px; position: relative; top: -30px;"><h2>price:<?=$detail->price?></h2></div>
						<?php echo Html::a('Add to cart',['ajax/add-to-cart','id'=>$detail->id]);?>
				</div>
				</div>
				<h2>descripstion</h2>
				<div class="news mb0">
					<?=$detail->description?>
				</div>
			</div>
			<div class="grid_3 prefix_2">
				<h2 class="head2">Related food</h2>
				<ul class="list l1">
					<li><a href="#">Vivamus vulputate est</a></li>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="bottom_block">
				<div class="grid_6">
					<h3>Follow Us</h3>
					<div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
					<nav>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about-us.html">About Us</a></li>
							<li><a href="menu.html">Menu</a></li>
							<li><a href="portfolio.html">Portfolio</a></li>
							<li class="current"><a href="news.html">News</a></li>
							<li><a href="contacts.html">Contacts</a></li>
						</ul>
					</nav>
				</div>
				<div class="grid_6">
					<h3>Email Updates</h3>
					<p class="col1">Join our digital mailing list and get news<br>
						deals and be first to know about events</p>
					<form id="newsletter" action="#">
						<div class="success">Your subscribe request has been sent!</div>
						<label class="email">
							<input type="email" value="Enter e-mail address" >
							<a href="#" class="btn" data-type="submit">subscribe</a> <span class="error">*This is not a valid email address.</span> </label>
					</form>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
</body>
</html>
