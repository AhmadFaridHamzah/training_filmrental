<?php


namespace app\controllers;

use Yii;
use app\models\Inventory;

class FilmcartController extends \yii\web\Controller
{


    public function actionIndex()
    {

    $film= Inventory::listfilm();

     	// echo "<pre>";
     	// print_r($film);
     	// echo "</pre>";

    $data['datafilm']=$film['listfilm'];
    $data['pagination']=$film['pagination'];




        return $this->render('index',$data);
    }

  public function actionAddcartfilm()
    {

    	$session=Yii::$app->session;
    	$request=Yii::$app->request;
    	$Response=Yii::$app->response;

    	$filmid=$request->post('id');
    	$idinv=$request->post('idinv');
// $cartfilmold=$session->remove('cartfilm');
//     	die();
      	
           if($session->has('cartfilm')){
           	$cartfilmold=$session->get('cartfilm');


           	foreach ($cartfilmold as $key => $value) {

           		$d[$value['film_id']]=[
           						'film_id'=>$value['film_id'],
    							'inventory_id'=>$value['inventory_id'],
           							];
           	}


           }




    	$d[$filmid]=[
    				 'film_id'=>$filmid,
    				 'inventory_id'=>$idinv
    				 	];


    	$session->set('cartfilm',$d);


    	$cartfilm=$session->get('cartfilm');


        $Response->format=\yii\web\Response::FORMAT_JSON;
        $Response->data=['status'=>'ok',
        					'count'=>count($d)];

    	// print_r($cartfilm);



    }


    


    public function actionListcartfilm(){

    	$session= Yii::$app->session->get('cartfilm');
    		

    		if($session){


    	foreach ($session as $key => $value) {
    		$idinv[]=$value['inventory_id'];
    	}

    		

		$listfilm=Inventory::listfilmbyid($idinv);
			

    	$data['title']='';
    	$data['sessioncart']=$session;
    	$data['sessioncartlist']=$listfilm;


    	 return $this->render('lisctcartfilm',$data);

    	 }

    }



    public function actionRemovecartfilm(){


    	$session=Yii::$app->session;
    	$request=Yii::$app->request;
    	$Response=Yii::$app->response;

    	$filmid=$request->post('id');
		

		unset($_SESSION['cartfilm'][$filmid]);//remove session by key
			$cartfilm=$session->get('cartfilm');

        $Response->format=\yii\web\Response::FORMAT_JSON;

if(array_key_exists($id,$cartfilm)){
		 $Response->data=['status'=>'ko'];
}else{

	$Response->data=['status'=>'ok'];
}
       


    }

    




}
