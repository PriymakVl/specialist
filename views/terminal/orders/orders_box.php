<?
	$number = 1;
?>

<a href="/terminal/logout" class="exit-link">Выход</a>

<div id="terminal-wrp">
	<div class="terminal-info"><?=$worker->title?></div>
    <!-- clock -->
	<div id="terminal-clock"></div>

	<div id="terminal-orders-wrp">
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
