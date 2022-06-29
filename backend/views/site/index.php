<?php
/** @var InvoiceTable $table */

/** @var InvoiceFood $food */
/** @var SiteController $data */
use backend\controllers\SiteController;
use common\models\InvoiceFood;
use common\models\InvoiceTable;
use yii\helpers\Json; ?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<style>
    .highcharts-figure, .highcharts-data-table table {
        min-width: 360px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

</style>
<div class="row">
	<div class="col-md-6">
		<h1>New order</h1>
		<div class="order-food">
			<?php foreach ($food as $item) { ?>
				<h3>Food order</h3>
				<h3 style="position: relative; bottom: 43px;left: 267px;color: green;"><?= date("Y-m-d H:i:s", $item->invoice->created_at) ?></h3>
				<div class="content">
					<h4>Order ID:<?= $item->id ?> | Token:<?= $item->invoice->token ?> | Total:$<?= number_format($item->price) ?></h4>
				</div>
			<?php } ?>
		</div>
		<div class="order-table">
			<?php foreach ($table as $item) { ?>
				<h3>Table order</h3>
				<h3 style="position: relative; bottom: 43px;left: 267px;color: #00b16a;"><?= date("Y-m-d H:i:s", $item->invoice->created_at) ?></h3>
				<div class="content">
					<h4>Order ID:<?= $item->id ?> | Token:<?= $item->invoice->token ?> | Total: $<?= number_format($item->table->price) ?></h4>
				</div>
			<?php } ?>

		</div>

	</div>
	<div class="col-md-6">
		<figure class="highcharts-figure">
			<div id="container">
			</div>
		</figure>
	</div>
</div>
<script>
	var chart = new Highcharts.chart('container', {
		xAxis      : {
			categories: <?=Json::encode($data['date'])?>
		},
		plotOptions: {
			line: {
				dataLabels         : {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series     : [{
			name: 'Food ordered',
			data: <?= Json::encode($data['food'])?>
		}, {
			name: 'Table booked',
			data: <?= Json::encode($data['table']) ?>
		}]
	});
</script>
