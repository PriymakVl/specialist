<?
	$number = 1;
?>

<link rel="stylesheet" href="/web/css/terminal_products.css">

<a href="/terminal/login" class="exit-link">Выход</a>

<div id="terminal-wrp">
	<div class="terminal-info"><?=$worker->title?></div>
	<div class="clock">10:49</div>
	<div class="terminal-orders-wrp">
		<? foreach ($orders as $order): ?>
			<div class="terminal-order-box" id_order="<?=$order->id?>">
				<div class="info-order">№<?=$number?></div>
				<div class="info-product">Заказ: <?=$order->symbol?></div>
				<div class="info-state">Запланирован</div>
			</div>
			<? $number++; ?>
		<? endforeach; ?>
	</div>
	
</div>

<script src="/web/terminal/clock.js"></script>