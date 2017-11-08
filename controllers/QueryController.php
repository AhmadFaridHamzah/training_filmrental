<?php
namespace app\controllers;

use Yii;
use yii\db\Query;

class QueryController extends \yii\web\Controller {

	public function actionIndex(){
		$query = new Query();

		$result = $query->select(['country_id', 'country'])
					->from('country')
					->offset(2)
					//->where(['country' => "Malaysia"])
					->all();

		echo "<pre>";
		print_r($result);
		echo "</pre>";
	}

	public function actionCustomer($search = "", $store_id=""){
		$query = new Query();

		$query->select([]);
		$query->from('customer');

		$query->join("LEFT JOIN", "store",
		 "customer.store_id=store.store_id");
		//$query->where(['first_name' => 'adam']);

		if(!empty($search)){
			$query->andWhere(['last_name' => $search]);
		}

		if(!empty($store_id)){
			$query->orWhere(['store_id' => $store_id]);
		}

		$query->limit(10)->offset(9);

		$query->orderBy(["first_name" => SORT_ASC,
							"last_name" => SORT_DESC]);

		$result = $query->all();

		echo "<pre>";
		print_r($result);
		echo "</pre>";
	}

}