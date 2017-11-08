<?php

namespace app\controllers;

use yii\web\Controller;

use app\models\Inventory;
use app\models\Film;


class GenerateGraphController extends Controller{

	public function actionIndex(){


		$data = Inventory::stockfilm();

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";

		// die();

		foreach($data as $key => $index){

			$stock[]= ['name'=>$index['name'],'data'=>[(int)$index['inventory_stock']]];

		}


		// echo "<pre>";
		// print_r(json_encode($stock));
		// echo "</pre>";

		// die();

		return $this->render('graph-view',[

			'stock_json'=> json_encode($stock,true)
		]);
	}


	public function actionDataPie(){

		$data = Film::totalfilmlanguage();

		// echo "<pre>";

		// print_r($data);

		// echo "</pre>";

		//kira total all film by language
		foreach ($data as $sum) {

			$datatotal[] = $sum['total_film'];
		}

		$total = array_sum($datatotal);

		foreach ($data as $key => $value) {
			
			$datapercent = round($value['total_film']/$total * 100 , 1);

			$language[] = ['name'=>$value['name'],'y'=>$datapercent];
		}

		// echo "<pre>";

		// print_r($language);

		// echo "</pre>";

		return $this->render('view-pie',[

				'language_json' => json_encode($language,true)

			]);
	}
}