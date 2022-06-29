<?php
/**
 * Created by Navatech.
 * @project fast-food
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    20/1/2021
 * @time    4:59 PM
 */
use yii\helpers\Url;

/** @var \frontend\controllers\SiteController $lunch */
/** @var \frontend\controllers\SiteController $breakfast */

?>

<div class="grid_12">
	<div class="bookonlinewrapper">
		<div class="container" id="bookonline">
			<h3 class="wow fadeInUp" data-wow-delay="0.3s"> BOOK ONLINE</h3>
			<form>
				<input type="text" class="name wow zoomIn" placeholder="Your Name"  style="width: 200px;">
				<input type="text" class="email wow zoomIn" placeholder="Your E-MAIL" style="width: 200px";>
				<input type="text" class="from wow zoomIn" placeholder="09-06-2014" style="width: 200px";>
				<input type="text" class="to wow zoomIn" placeholder="09-06-2014" style="width: 200px">
				<input type="text" class="persons wow zoomIn" placeholder="Number of persons" style="width: 200px">
				<button class="booknow wow fadeInUp"> BOOK NOW </button>
			</form>
		</div>
	</div>
</div>
<div class="clear"></div>
<div class="grid_12">
	<div class="hor_separator"></div>
</div>

<div class="grid_12">
	<div class="car_wrap">
		<h2>LUNCH</h2>
		<ul class="carousel1">
			<?php foreach ($lunch as $value){?>
			<li>
				<div><img src="<?=$value->image?>" alt="" style="height: 200px;">
					<div class="col1 upp"> <a href="<?= Url::to(['/detail/index','id'=>$value->id])?>"><?=$value->name?></a></div>
					<span> <?=$value->description?></span>
					<div class="price"><?=number_format($value->price).'$'?></div>
				</div>
			</li>
			<?php }?>
		</ul>
	</div>
</div>
<div class="grid_12">
	<div class="car_wrap">
		<h2>BREAKFAST</h2>
		<a href="#" class="prev"></a><a href="#" class="next"></a>
		<ul class="carousel1">
			<?php foreach ($breakfast as $values){?>
			<li>
				<div><img src="<?=$values->image?>" alt="" style="height: 200px;">
					<div class="col1 upp"> <a href="<?= Url::to(['/detail/index','id'=>$values->id])?>"><?=$values->name?></a></div>
					<span><?=$values->description?></span>
					<div class="price"><?=number_format($values->price).'$'?></div>
				</div>
			</li>
			<?php }?>
		</ul>
	</div>
</div>
<div class="clear"></div>
<div class="bottom_block">
	<div class="grid_6">
		<h3>Follow Us</h3>
		<div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
		<nav>
			<ul>
				<li class="current"><a href="index.html">Home</a></li>
				<li><a href="about-us.html">About Us</a></li>
				<li><a href="menu.html">Menu</a></li>
				<li><a href="portfolio.html">Portfolio</a></li>
				<li><a href="news.html">News</a></li>
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
