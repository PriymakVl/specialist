<?
	$number = 1;
?>

<a href="/terminal/logout" class="exit-link">Выход</a>

<div id="terminal-wrp">
	<div class="terminal-info"><?=$worker->title?></div>
    <!-- clock -->
	<!--<div id="terminal-clock"></div>-->
	<h3>Перечень заказов</h3>

	<div id="terminal-orders-wrp">
		<? if ($orders): ?>
			<? foreach ($orders as $order): ?>
				<div class="terminal-order-box" id_order="<?=$order->id?>">
					<div class="info-order">№<?=$number?></div>
					<div class="info-product">Заказ: <?=$order->symbol?></div>
					<div class="info-state">Запланирован</div>
				</div>
				<? $number++; ?>
			<? endforeach; ?>
		<? else: ?>
			<h3>Заказов нет</h3>
		<? endif; ?>
	</div>
</div>
