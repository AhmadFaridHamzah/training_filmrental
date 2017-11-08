<?php 
	
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
?>


<?php $form = ActiveForm::begin(); ?>

	<div class = "form-group">
		<?= Html::submitButton('Button',['class' => 'btn btn-primary btn-click','id'=>'myButton' ]) ?>
	</div>

	<div class = "form-group">
		<?= Html::submitButton('Button',['class' => 'btn btn-primary btn-click','id'=>'myBtn' ]) ?>
	</div>


<?php ActiveForm::end(); ?>

<?php

$this->registerJsFile(

	'@web/js/main.js',
	['depends'=>[\yii\web\JqueryAsset::className()]]

);


$this->registerCssFile(

	'@web/css/red-body.css',
	['depends' => [\yii\bootstrap\BootstrapAsset::className()]]

);

?>