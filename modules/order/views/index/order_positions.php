<?php
	$number = 1;
?>

<table id="table-order-positions">
	<caption>Позиции заказа</caption>
	<tr>
		<th>№</th>
		<th>Обозначение</th>
		<th>Количество</th>
		<th>Примечание</th>
	</tr>
	<? if ($order->positions): ?>
		<? foreach ($order->positions as $position): ?>
			<tr>
				<td width="50"><?=$number?></td>
				<td width="200"><?=$position['symbol']?></td>
				<td width="80"><?=$position['qty'].'шт'?></td>
				<td><?=$position['note']?></td>
			</tr>
			<? $number++ ?>
		<? endforeach; ?>
	<? else: ?>
		<tr>
			<td colspan="4">Позиций нет</td>
		</tr>
	<? endif; ?>
</table>