<?php 
namespace LiqPay;

use yii\base\Widget;

require "./config.php";

class LiqPayForm extends Widget{

	public function init(){
		parent::init();
	}

	public function run(){
		return "<h1>" . $public_key . "</h1>";
	}
}
?>