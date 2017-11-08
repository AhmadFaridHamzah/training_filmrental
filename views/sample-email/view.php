<?php 
	
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin([

		'action' => \yii\helpers\Url::to(['/sample-email/submit-email']),

	]); ?>

<?= yii\bootstrap\Alert::widget([

	'options' => [
		'class' => 'alert-info',
	],

	'body' => Yii::$app->getSession()->getFlash('msg'),

	]);
?>

	<div class="form-group">
	<?= Html::submitButton('Sent Email',['class'=>'btn btn-primary']) ?>
	</div>



<?php ActiveForm::end(); ?>