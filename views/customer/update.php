<?php
$this->title = 'Update Customer';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
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
echo $this->render('_form', ['model' => $model]);
?>