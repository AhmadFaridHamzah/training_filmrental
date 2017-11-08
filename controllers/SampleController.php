<?php

namespace app\controllers;

use yii\web\controller;


class SampleController extends Controller{


	public function actionHomeTesting(){

		echo "Ini function index";
	}

	public function actionSampleView(){

		$data = "Training Yii Intermediate";
		$message  = "Tahniah";

		$employee = [
				'name'=> 'Farid',
				'umur' => '32',
				'ic' => '111111111'
		];

		return $this->render('index',[
			'title'=>$data,
			'msg'=>$message,
			'employee'=>$employee
		]);
	}

}
