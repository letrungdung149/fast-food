<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TableName */

$this->title = 'Update Table Name: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Table Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-name-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
