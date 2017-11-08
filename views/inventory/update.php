<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Inventory',
]) . $model->inventory_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inventory_id, 'url' => ['view', 'id' => $model->inventory_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="inventory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
