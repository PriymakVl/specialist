<?
	$number = 1;
?>
<link rel="stylesheet" href="/web/css/terminal/products.css">

<a href="/terminal/login" class="exit-link">Выход</a>
<a href="/terminal/orders" class="orders-link">Заказы</a>

<div id="terminal-wrp">
	<div class="terminal-info"><?=$worker->title?></div>
	<!-- <div id="clock">10:49</div> -->
	<div id="terminal-products-wrp">
		<? foreach ($products as $product): ?>
			<div class="terminal-product-box" style="background:<?=$product->bgTerminalProductBox?>" id_order="<?=$order->id?>" id_prod="<?=$product->id?>" id_worker="<?=$worker->id?>" prod_state="<?=$product->stateWork?>">
				<div class="info-order">№<?=$number?> заказ: <?=$order->symbol?></div>
				<div class="info-product"><?=$product->symbol?> <?=$product->name?> (<?=$product->orderQtyAll?>шт.)</div>
				<div class="info-state"><?=$product->stateWorkConvert?></div>
			</div>
			<? $number++; ?>
		<? endforeach; ?>
	</div>
	
</div>
