<?php
namespace app\controllers;

use Yii;

use yii\web\Controller;

use app\models\EntryForm;

class FormController extends Controller{


	public function actionIndex(){

		$model = new EntryForm();

		if($model->load(Yii::$app->request->post()) && $model->validate()){
			//data submit

			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>";

			// echo "berjaya hantar";

			return $this->render('index-success',['model'=>$model]);

		}else{
			// form 
			return $this->render('index',['model'=>$model]);
		}

	}


	public function actionTestPjax(){

		 $model = Yii::$app->formatter->asDate('now', 'H:i:s');

		return $this->render('test-pjax-form',['response' => $model,
		 ]);
	}

	public function actionDatePjax(){

		 $model = Yii::$app->formatter->asDate('now', 'dd-MM-yyyy');

		return $this->render('test-pjax-form',['response' => $model,
		 ]);
	}

}