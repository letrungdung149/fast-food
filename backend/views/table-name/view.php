<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TableName */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Table Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="table-name-view">

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
            'room_id',
            'name',
            'type',
            'price',
            'description:ntext',
	        [
		        'attribute' => 'image',

		        'format' => 'html',

		        'label' => 'Image',

		        'value' => function ($data) {

			        return Html::img($data['image'],
				        ['width' => '100px',
				         'height'=>'100px',
				        ]);

		        },

	        ],
        ],
    ]) ?>

</div>
