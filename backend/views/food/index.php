<?php

use common\models\Food;
use common\models\Menu;
use kartik\grid\DataColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\FoodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foods';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="food-index" style="width: 100%;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
	            'attribute'           => 'menu_id',
	            'filter'              => ArrayHelper::map(Menu::find()->all(), 'id', 'name'),
	            'format' => 'html',
	            'value' => function(Food $data){
    	          return $data->menu->name;
	            },
            ],
	        [
		        'format' => 'Currency',
		        'attribute' => 'price',
	        ],
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
//            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
