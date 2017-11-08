<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model{
	
	public $name;
	public $email;
	public $address;
	public $category;
	public $gender;
	public $captcha;
	public $phone;

	public function rules(){

		return [

			[['name','email','category','gender'],'required','message' => 'Ruangan ini wajib di isi'],

			[['address'],'required','message' => 'Alamat ini wajib di isi'],
			[['phone'],'string','max'=>12],
			[['email'],'email'],
			[['captcha'],'captcha'],

		];
	}

	public function attributeLabels(){

		return [
			'name' => 'Nama',
			'email' => 'E-mail',
			'address' => 'Alamat',

		];
	}





}
