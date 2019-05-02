<!-- css files -->
<link rel="stylesheet" href="/web/css/total/form.css">
<link rel="stylesheet" href="/modules/order_action/css/form.css">

<div id="content">

	<? if ($action->id_prod): ?>
		<? include_once('form_product.php'); ?>
	<? elseif ($action->id_order): ?>
		<? include_once('form_product.php'); ?>
	<? else: ?>
		<? include_once('form_other.php'); ?>
	<? endif; ?>
	
</div>

<!-- js files -->
<script src="/modules/product_action/js/select_action.js"></script>


