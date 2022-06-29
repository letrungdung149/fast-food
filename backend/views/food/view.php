<?php

use common\models\Food;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Food */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="food-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'menu_id',
	        [
		        'attribute'      => 'price',
		        'value'          => function(Food $data) {
			        return number_format($data->price) . ' đ';
		        },
		        'contentOptions' => ['class' => 'text-right'],
	        ],
	        [

		        'attribute' => 'image',

		        'format' => 'html',

		        'label' => 'image',

		        'value' => function ($data) {

			        return Html::img($data['image'],
				        ['width' => '100px',
				         'height'=>'100px',
				        ]);

		        },

	        ],
            'description:ntext',
        ],
    ]) ?>

</div>
