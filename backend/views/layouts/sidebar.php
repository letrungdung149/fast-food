<?php

use yii\helpers\Url;

?>
<div id="sidebar" class="sidebar responsive">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="ace-icon fa fa-signal"></i>
			</button>

			<button class="btn btn-info">
				<i class="ace-icon fa fa-pencil"></i>
			</button>

			<button class="btn btn-warning">
				<i class="ace-icon fa fa-users"></i>
			</button>

			<button class="btn btn-danger">
				<i class="ace-icon fa fa-cogs"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->

	<ul class="nav nav-list">
		<li class="active">
			<a href="index.php">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Dashboard </span>
			</a>

			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="" class="dropdown-toggle">
				<i class="fas fa-align-justify"></i>
				<span class="menu-text">
								Menu
							</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?= Url::to(['/menu/create'])?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add new menu
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?= Url::to(['/menu/index'])?>">
						<i class="menu-icon fa fa-caret-right"></i>
						List menu
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">

			<a href="#" class="dropdown-toggle">
				<i class="fas fa-utensils"></i>
				<span class="menu-text"> Food </span>


				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?= Url::to(['/food/create'])?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add new food
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?= Url::to(['/food/index'])?>">
						<i class="menu-icon fa fa-caret-right"></i>
						List food
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="fas fa-city"></i>
				<span class="menu-text"> Room </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?= Url::to(['/room/create'])?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add new room
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?= Url::to(['/room/index'])?>">
						<i class="menu-icon fa fa-caret-right"></i>
						List room
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="fas fa-table"></i>
				<span class="menu-text"> Table </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?= Url::to(['/table-name/create'])?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add new table
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?= Url::to(['/table-name/index'])?>">
						<i class="menu-icon fa fa-caret-right"></i>
						List table
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="fas fa-money-bill"></i>
				<span class="menu-text"> Order </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?= Url::to(['/invoice/index'])?>">
						<i class="menu-icon fa fa-caret-right"></i>
						List order
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>
	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>

	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
	<script src="https://kit.fontawesome.com/c75efb11bf.js" crossorigin="anonymous"></script>
</div>
