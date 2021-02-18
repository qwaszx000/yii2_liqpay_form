<?php 
namespace LiqPay;

use yii\base\Widget;


class LiqPayForm extends Widget{
	public $amount;
	public $description;
	public $order_id;
	public $action;

	private $config;
	private $public_key;
	private $private_key;

	public function init(){
		parent::init();

		//load extension config
		$this->config = require(__DIR__ . "/config.php");

		if(is_null($this->action)){
			$this->action = $this->config["action"];
		}

		//testing mode, prepare and load keys
		if($this->config["is_testing"]){
			$this->public_key = $this->config["test_public_key"];
			$this->private_key = $this->config["test_private_key"];
		} else {
			$this->public_key = $this->config["public_key"];
			$this->private_key = $this->config["private_key"];
		}


	}

	public function run(){
		parent::run();

		//generate data
		$data_array = [
			"version" => $this->config["version"],
			"action" => $this->action,
			"amount" => $this->amount,
			"currency" => $this->config["currency"],
			"description" => $this->description,
			"order_id" => $this->order_id,
			"public_key" => $this->public_key,
			"result_url" => $this->config["result_url"],
			"server_url" => $this->config["server_url"],
			"language" => $this->config["language"]
		];

		//data for form
		$form_info = [
			"client_server_api_url" => $this->config["client_server_api_url"],
			"client_server_api_method" => $this->config["client_server_api_method"],
			"auto_submit" => $this->config["auto_submit"]
		];

		//generate data and signature
		$data = LiqPayFunctions::generateData($data_array);
		$signature = LiqPayFunctions::generateSignature($data, $this->private_key);

		//render widget ./views/LiqPayFormWidget.php
		return $this->render('LiqPayFormWidget', ['data' => $data, 'signature' => $signature, 'form_info' => $form_info]);
	}
}
?>