<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SampleEmailController extends Controller
{
	public function actionIndex(){

		return $this->render('view');
	}

	public function actionSubmitEmail(){


		// print_r($_POST);
		$date = Yii::$app->formatter->asDate('now','dd/MM/yyyy');

		$message = "<p>Mr/Mrs</p>";

		$message .= "<p><b>Tahniah anda berjaya hantar email<b></p>";

		$message .="<p>Dengan ini berjaya hantar email pada tarikh ".$date."</p>";

		$cc = ['cc1@admin.com','cc2@admin.com','cc3@admin.com'];

		$file = \Yii::getAlias("@webroot/attach_file/sample.pdf");

		try{

			Yii::$app->mailer->compose()
			->setFrom('from@domain.com')
			->setTo('to@domain.com')
			->setCc($cc)
			->setSubject('Message Subject')
			->setHtmlBody($message)
			->attach($file)
			->send();

			Yii::$app->session->setFlash('msg','Success Sent');

		}catch(\Swift_SwiftException $exception){

			$error = $exception->getMessage();

			print_r($error);

			die();

			Yii::$app->session->setFlash('msg','Failed Sent');
		}

		

		return $this->render('view');
		
	}
	
}