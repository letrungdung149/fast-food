<?php

use common\models\Room;
use common\models\TableName;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TableNameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Table Names';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-name-index" style="width: 100%;">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
	        [
		        'attribute'           => 'room_id',
		        'filter'              => ArrayHelper::map(Room::find()->all(), 'id', 'name'),
		        'format' => 'html',
		        'value' => function(TableName $data){
			        return $data->room->name;
		        },
	        ],
            'name',
//            'type',
	        [
		        'format' => 'Currency',
		        'attribute' => 'price',
	        ],
	        //            'description:ntext',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
