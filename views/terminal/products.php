<?
	$number = 1;
	
	function getBackgraundProductBox($state)
	{
		if ($state == Order::STATE_WORK_PROGRESS) return 'green';
		else if ($state == Order::STATE_WORK_STOPPED) return 'red';
	}

?>
<link rel="stylesheet" href="/web/css/terminal_products.css">

<a href="/terminal/login" class="exit-link">Выход</a>
<a href="/terminal/orders" class="orders-link">Заказы</a>

<div id="terminal-wrp">
	<div class="terminal-info"><?=$worker->title?></div>
	<!-- <div id="clock">10:49</div> -->
	<div class="terminal-products-wrp" style="<?=$background?>">
		<? foreach ($products as $product): ?>
			<? $background_prod = getBackgraundProductBox($product->stateWork); ?>
			<div class="terminal-product-box" style="background:<?=$background_box?>" id_order="<?=$order->id?>" id_prod="<?=$product->id?>" id_worker="<?=$worker->id?>" prod_state="<?=$product->stateWork?>">
				<div class="info-order">№<?=$number?> заказ: <?=$order->symbol?></div>
				<div class="info-product"><?=$product->symbol?> <?=$product->name?> (<?=$product->orderQtyAll?>шт.)</div>
				<div class="info-state"><?=$product->stateWorkConvert?></div>
			</div>
			<? $number++; ?>
		<? endforeach; ?>
	</div>
	
</div>

<script src="/web/js/terminal/product_actions.js"></script>