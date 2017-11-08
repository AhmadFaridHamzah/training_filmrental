<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
// echo "<pre>";
// print_r($datafilm);
// echo "</pre>";
?>


<div class="container">
	<div class="row">
  <?php
foreach ($datafilm as $key => $value) {

  ?>

    	<!-- BEGIN PRODUCTS -->
  		<div class="col-md-4 col-sm-8">
    		<span 
        style="min-height: 500px; min-width: 190px;" class="thumbnail text-center">
      			<img src="http://placehold.it/350x280" alt="...">
      			<h4 class="text-danger"><?=
            Html::encode($value['title'])?></h4>
      			<div class="ratings">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                </div>
      			<p>Uttar Pradesh (North Zone)</p>
      			<p>Registration No :gaadiexpert.com</p>
      			<p>Auction End in 5 days</p>



      			<hr class="line">
      			<div class="row">
      				<div class="col-md-6 col-sm-6">
      					<?=
            Html::encode($value['rental_rate'])?>
      				</div>
      				<div class="col-md-6 col-sm-6">
      					<button class="btn btn-danger right addfilmcart"
                data-id='<?=
            Html::encode($value['film_id'])?>'
                data-idinv='<?=
            Html::encode($value['inventory_id'])?>'


                 > Rental</button>
      				</div>
      				
      			</div>
    		</span>
  		</div>
    <?php

}  //end foreach
    ?>
 

  		<!-- END PRODUCTS -->
	</div>
     <?php
echo LinkPager::widget(['pagination'=>$pagination]);

    ?>

</div>
<?php
$urlsession=Url::to(['filmcart/addcartfilm']);
$script = <<< JS

    $(document).ready(function(){

$( ".addfilmcart" ).click(function() {
  

  var id=$(this).data('id');
  var idinv=$(this).data('idinv');


   $.ajax({
    url:'$urlsession',
    data:{id:id,idinv:idinv},
    type:'post',
    dataType:'json',
    success:function(data){
      if(data.status=='ok'){

        $.pjax.reload({container:'#cartsession'});

      }
    },

   });

});

    });
JS;

  $this->registerJs($script);

