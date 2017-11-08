<?php
namespace app\controllers;

use Yii;
use app\models\Customer;

class CustomerController extends \yii\web\Controller {
	public function actionIndex(){
		$customers = Customer::find();

	return $this->render('index', ['customers' => $customers]);
	}

	public function actionCreate(){
		$customer = new Customer;

		if($customer->load(Yii::$app->request->post()) && $customer->validate()){
			$customer->store_id = 1;
			$customer->address_id = 1;

			if($customer->save()){
				Yii::$app->session->setFlash("success_msg", "Tahniah data berjaya disimpan");
			}else{
				Yii::$app->session->setFlash("error_msg",
				 "Error:".$customer->getErrors());
			}

			$this->redirect(['index']);
		}

		return $this->render('create', ['model' => $customer]);
	}

	public function actionView($id){
		$customer = Customer::findOne($id);

		return $this->render('view', ['model' => $customer]);
	}

	public function actionUpdate($id){
		$customer = Customer::findOne($id);

		if($customer->load(Yii::$app->request->post()) && $customer->validate()){

			if($customer->save()){
				Yii::$app->session->setFlash("success_msg", "Tahniah data berjaya dikemaskini");
			}else{
				Yii::$app->session->setFlash("error_msg",
				 "Error:".$customer->getErrors());
			}

		}

		return $this->render('update', ['model' => $customer]);
	}

	public function actionDelete($id){
		$customer = Customer::findOne($id);

		if($customer->delete()){
			Yii::$app->session->setFlash("success_msg", "Tahniah data berjaya dihapuskan");
		}else{
			Yii::$app->session->setFlash("error_msg",
			 "Error:".$customer->getErrors());
		}

		$this->redirect(['index']);
	}
}