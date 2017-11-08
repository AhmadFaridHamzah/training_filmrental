<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;

class UploadController extends Controller{


	public function actionTestUpload(){

		$model = new UploadForm();

		if(Yii::$app->request->isPost){

			$model->imageFile = UploadedFile::getInstance($model,'imageFile');

			if($model->upload()){

				echo "<pre>";

				print_r($model);

				echo "</pre>";

				return;
			}



		}

		return $this->render('index',['model'=> $model]);
	}
}