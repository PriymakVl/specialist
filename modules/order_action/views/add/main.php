<!-- css files -->
<link rel="stylesheet" href="/web/css/total/form.css">
<link rel="stylesheet" href="/modules/order_action/css/form.css">

<div id="content">

	<? if (isset($product)): ?>
		<? include_once('form_product.php'); ?>
	<? elseif (isset($order)): ?>
		<? include_once('form_order.php'); ?>
	<? else: ?>
		<? include_once('form_other.php'); ?>
	<? endif; ?>
	
</div><!-- id content -->

<!-- js files -->
<script src="/modules/order_action/js/select_action.js"></script>
<script src="/web/js/datepicker.js"></script>

