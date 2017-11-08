<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'View Customer';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title)?></h1>

<?= DetailView::widget([
	"model" => $model,
	"attributes" => [
		'customer_id',
		'first_name',
		'last_name',
		'email',
	]
])?>