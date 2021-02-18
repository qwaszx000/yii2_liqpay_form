<?php 
use yii\helpers\Html;
?>

<?= Html::encode($signature); ?>

<?= Html::beginForm($form_info["client_server_api_url"], $form_info["client_server_api_method"]); ?>

<?= Html::hiddenInput('data', $data) ?>
<?= Html::hiddenInput('signature', $signature) ?>
<?= Html::submitButton('Go to liqpay payment!', ['id' => 'liqpay_form_submit_button']) ?>

<?php if($form_info["auto_submit"]): ?>
	<?= Html::script('var button = document.getElementById("liqpay_form_submit_button");button.click();') ?>
<?php endif; ?>

<?= Html::endForm(); ?>