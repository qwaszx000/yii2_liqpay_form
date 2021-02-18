<?php 
namespace LiqPay;

class LiqPayFunctions{

	
	//https://www.liqpay.ua/documentation/api/aquiring/checkout/doc
	//Required: version, public_key, action, amount, currency, description, order_id
	public function generateData($params){
		$data = '{';

		foreach ($params as $key => $value) {
			//"$key": "$value",
			if(is_null($value) or empty($value)){
				continue;
			}
			$data .= '"' . $key . '": ' . '"' . $value . '",';
		}

		$data .= "}";
		return base64_encode($data);
	}

	public function generateSignature($data, $private_key){
		$signature = base64_encode(sha1($private_key . $data . $private_key, true));
		return $signature;
	}
}

?>