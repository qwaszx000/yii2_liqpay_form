# YII 2 liqpay (Client - Server) basic extension
## Adds widget `LiqPayForm`

## How to add to project:
 - open composer.json
 - add `"qwaszx000/liqpay_form": "*"` in `"require": {...`
 - execute `composer update`
## How to use widget:
 - open `./vendor/qwaszx000/liqpay_form/src/LiqPay/config.php` and configurate it with your data
 - create widget by `<?= LiqPay\LiqPayForm::widget(['amount' => '***', 'description' => '***', 'order_id' => '***']) ?>`
  
  Optional param: action (will be got from config file if not selected in `LiqPay\LiqPayForm::widget([...])`)
## Example of usage:
`<?= LiqPay\LiqPayForm::widget(['amount' => '123', 'description' => 'description', 'order_id' => '0050']) ?>`
