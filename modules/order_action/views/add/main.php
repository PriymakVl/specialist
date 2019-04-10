<!-- css files -->
<link rel="stylesheet" href="/web/css/total/form.css">
<link rel="stylesheet" href="/modules/order_action/css/form.css">

<div id="content">

	<? if ($product): ?>
		<? include_once('form_product.php'); ?>
	<? else: ?>
		<? include_once('form_order.php'); ?>
	<? endif; ?>
	
</div><!-- id content -->

<!-- js files -->
<script src="/modules/order_action/js/select_action.js"></script>

