<?php 

return [
	//https://www.liqpay.ua/documentation/api/aquiring/checkout/doc
	"public_key" => "public_key_here",
	"private_key" => "private_key_here",
	"test_public_key" => "test_public_key_here",
	"test_private_key" => "test_private_key_here",
	"is_testing" => false,
	"currency" => "UAH",
	"version" => "3",
	"action" => "pay",
	"language" => "ru",
	"result_url" => "http://localhost:8080",
	"server_url" => "",
	"client_server_api_url" => "https://www.liqpay.ua/api/3/checkout",
	"client_server_api_method"=> "POST",
	"auto_submit" => false
];

?>