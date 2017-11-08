<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(); ?>

	<?php echo $form->field($model,'name')?>

	<?= $form->field($model,'email') ?>

	<?= $form->field($model,'address') ?>

	<?= $form->field($model,'phone') ?>


	<?= $form->field($model, 'category')->dropdownList([

			1 => 'item 1',
			2 => 'item 2',

		]); 
		?>

	<?= $form->field($model,'gender')->checkboxList([

			'M' => 'Lelaki',
			'F' => 'Perempuan',

	]);?>

	<?= $form->field($model,'captcha')->widget(\yii\captcha\Captcha::classname(),[]) ?>

	<div class="form-group">
		<?= Html::submitButton('Hantar',['class'=>'btn btn-primary']) ?> 
	</div>


<?php ActiveForm::end(); ?>