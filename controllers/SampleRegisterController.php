<?php

namespace app\controllers;

use yii\web\Controller;

class SampleRegisterController extends Controller{

	public function actionSample1(){

		return $this->render('sample1');
	}

	public function actionSampleFile(){
		
		return $this->render('sample2');
	}
}