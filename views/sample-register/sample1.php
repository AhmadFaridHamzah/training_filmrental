<?php 
	
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\web\View;

?>
<!-- <style>
 body{

		 	background:#f00;
		 }

</style> -->

<!-- <script>
	$(document).ready(function(){

		$('#myButton').on('click',function{

			alert('Button clicked!');
		});

	});

</script> -->

<?php $form = ActiveForm::begin(); ?>

	<div class = "form-group">
		<?= Html::submitButton('Button',['class' => 'btn btn-primary btn-click','id'=>'myButton' ]) ?>
	</div>

	<div class = "form-group">
		<?= Html::submitButton('Button',['class' => 'btn btn-primary btn-click','id'=>'myBtn' ]) ?>
	</div>


<?php ActiveForm::end(); ?>

<?php 
$this->registerJs(
	
	"$('#myButton').on('click',function(){
		
		alert('Button clicked!');

	});

	$('#myBtn').on('click',function(){
		
		alert('alert 2');

	});",


	View::POS_READY,

	'my-button-handler'

);

$this->registerCss("

		 body{

		 	background:#f00;
		 }

	");
?>