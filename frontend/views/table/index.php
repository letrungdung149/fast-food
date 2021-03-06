<?php

use common\models\TableName;
use frontend\controllers\TableController;
use yii\helpers\Html;
/** @var TableController $table */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">book online</button>
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
				</div>
				<div class="modal-body">
						<p>Some text in the modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="content">
	<div class="container_12">
		<div class="grid_5">
				<h2><?=$table[0]->room->name?>(<?=$table[0]->room->type?>)</h2>
				<img src="<?=$table[0]->image?>" alt="" class="img_inner" style="height: 250px; width: 250px;">
				<div class="content" style="position: relative; bottom: 220px; left: 263px;">
					<h2><?=$table[0]->name?></h2>
					<p class="col1" style=""><?=$table[0]->description?></p>
					<?php echo Html::a('Add to cart',['ajax/add-table','id'=>$table[0]->id]);?>
				</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
</body>

</html>
