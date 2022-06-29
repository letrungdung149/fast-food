<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TableName */

$this->title = 'Create Table Name';
$this->params['breadcrumbs'][] = ['label' => 'Table Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-name-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
