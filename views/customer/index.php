<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

$this->title = "Customers";
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
	<?= Html::a('Create', ['create'], ['class' => 'btn btn-success'])?>
</p>
<?php if($flash = Yii::$app->session->getFlash("success_msg")): ?>
	<div class="alert alert-success">
		<p><?=$flash?></p>
	</div>
<?php elseif($flash = Yii::$app->session->getFlash("error_msg")): ?>
	<div class="alert alert-danger">
		<p><?=$flash?></p>
	</div>	
<?php endif; ?>
<?php
	$dataProvider = new ActiveDataProvider([
		'query' => $customers->orderBy(['customer_id' => SORT_DESC]),
		'pagination' => [
			'pageSize' => 20,
		]
		]);

echo GridView::widget([
	'dataProvider' => $dataProvider,
	'columns' => [
	    ['class' => 'yii\grid\SerialColumn'],
		'first_name',
		'last_name',
		'email',
		[
			'class' => 'yii\grid\ActionColumn',
			'header' => '<b style="color:#33a3dd;">Tindakan</b>',
			'template' => '{view} {update} {delete} {link}',
			'buttons' => [
							'link' => function($url, $model){
								if($model->store_id==\app\models\Customer::STORE_LAZADA){
									return Html::a('Merah', 'approve');
								}else{
									return Html::a('Hijau', 'verify');
								} 
							}
					     ]
		]
	]
]);
?>