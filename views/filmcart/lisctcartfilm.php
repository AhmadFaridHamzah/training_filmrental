<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>


<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>

                        <?php

                            foreach ($sessioncartlist as $key => $value) {
                          
                        ?>
                   
                    <tr id='inv<?=
            Html::encode($value['film_id'])?>'  >
                        <td class="col-md-6">
                        <div class="media">
                            <a class=" pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?=
            Html::encode($value['title'])?></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span>
                            </div>
                        </div></td>
                        <td class="col-md-1" style="text-align: center">
                        <input type="filmno" class="form-control" id="exampleInputEmail1" value="1">
                        </td>
                        <td class="col-md-1 text-center"><strong><?=
            Html::encode($value['rental_rate'])?></strong></td>
                        <td class="col-md-1 text-center"><strong><?=
            Html::encode($value['rental_rate'])?></strong></td>
                        <td class="col-md-1">
                        <button type="button" class="btn btn-danger btnremovecart" 
                        data-id='<?=
            Html::encode($value['film_id'])?>'>
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
                    <?php

                            }
                    ?>


                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$urlsession=Url::to(['filmcart/removecartfilm']);
$script = <<< JS

    $(document).ready(function(){

$( ".btnremovecart" ).click(function() {
  

  var id=$(this).data('id');


   $.ajax({
    url:'$urlsession',
    data:{id:id},
    type:'post',
    dataType:'json',
    success:function(data){
      if(data.status=='ok'){
        $('#inv'+id).remove();
        $.pjax.reload({container:'#cartsession'});

      }
    },


   });

});

    });
JS;

  $this->registerJs($script);

