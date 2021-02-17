<?php 
namespace LiqPay;

use yii\base\Widget;


class LiqPayForm extends Widget{
	public $amount;
	public $description;
	public $order_id;
	public $action;

	private $config;

	public function init(){
		parent::init();

		$this->config = require(__DIR__ . "/config.php");
	}

	public function run(){
		parent::run();

		if(is_null($this->amount)){
			return "LiqPayForm widget error: amount is null";
		}
		if(is_null($this->description)){
			return "LiqPayForm widget error: description is null";
		}
		if(is_null($this->order_id)){
			return "LiqPayForm widget error: order_id is null";
		}

		if(is_null($this->action)){
			$this->action = $this->config["action"];
		}

		$data_array = [
			"version" => $this->config["version"],
			"action" => $this->action,
			"amount" => $this->amount,
			"currency" => $this->config["currency"],
			"description" => $this->description,
			"order_id" => $this->order_id
		];

		$private_key = "";

		if($this->config["is_testing"]){
			$data_array["public_key"] = $this->config["test_public_key"];
			$private_key = $this->config["test_private_key"];
		} else {
			$data_array["public_key"] = $this->config["public_key"];
			$private_key = $this->config["private_key"];
		}

		$form_info = [
			"client_server_api_url" => $this->config["client_server_api_url"],
			"client_server_api_method" => $this->config["client_server_api_method"]
		];

		$data = LiqPayFunctions::generateData($data_array);
		$signature = LiqPayFunctions::generateSignature($data, $private_key);

		return $this->render('LiqPayFormWidget', ['data' => $data, 'signature' => $signature, 'form_info' => $form_info]);
	}
}
?>