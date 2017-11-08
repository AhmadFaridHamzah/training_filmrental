<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php Pjax::begin() ?>


	<?= Html::a("Time",['form/test-pjax'],['class'=>'btn btn-lg btn-primary']) ?>

	<?= Html::a("Date",['form/date-pjax'],['class'=>'btn btn-lg btn-success']) ?>

	<h1>Current Time/Date: <?= $response ?> </h1>

<?php Pjax::end() ?>