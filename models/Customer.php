<?php

namespace app\models;

use yii\db\ActiveRecord;

class Customer extends ActiveRecord {

	const STORE_LAZADA = 2;
	const STORE_ZALORA = 1;

	public function rules(){
		return [
			[['first_name'], 'required'],
			[['last_name'], 'string'],
			[['email'], 'email'],
		];
	}
}