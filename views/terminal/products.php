<?
	$number = 1;
?>
<link rel="stylesheet" href="/web/css/terminal_products.css">

<a href="/terminal/login" class="exit-link">Выход</a>
<a href="/terminal/orders" class="orders-link">Заказы</a>

<div id="terminal-wrp">
	<div class="terminal-info">Логвинов О.</div>
	<!-- <div class="clock">10:49</div> -->
	<div class="terminal-products-wrp">
		<? foreach ($products as $product): ?>
			<div class="terminal-product-box">
				<div class="info-order">№<?=$number?> заказ: <?=$order->symbol?></div>
				<div class="info-product"><?=$product->symbol?> <?=$product->name?> (<?=$product->orderQty?>шт.)</div>
				<div class="info-state">Запланировано</div>
			</div>
			<? $number++; ?>
		<? endforeach; ?>
	</div>
	
</div>