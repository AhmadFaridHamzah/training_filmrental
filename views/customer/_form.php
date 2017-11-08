<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

if($model->isNewRecord){
	$btnLabel = "Create";
	$btnClass = "btn btn-success";
}else{
	$btnLabel = "Update";
	$btnClass = "btn btn-primary";
}

?>

<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model,'first_name') ?>

	<?= $form->field($model,'last_name') ?>

	<?= $form->field($model,'email') ?>

	<div class="form-group">
		<?= Html::submitButton($btnLabel,['class'=> $btnClass]) ?> 
	</div>


<?php ActiveForm::end(); ?>