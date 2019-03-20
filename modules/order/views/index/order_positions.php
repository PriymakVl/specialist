<?php
	$number = 1;
?>
<table id="table-order-positions">
	<caption>Позиции заказа</caption>
	<tr>
		<th  width="50">№</th>
		<th width="200">Обозначение</th>
		<th width="80">Количество</th>
		<th>Примечание</th>
		<th width="100">Управление</th>
	</tr>
	<? if ($order->positions): ?>
		<? foreach ($order->positions as $position): ?>
			<tr>
				<td><?=$number?></td>
				<td ><?=$position->symbol?></td>
				<td><?=$position->qty?>шт</td>
				<td><?=$position->note?></td>
				<td class="position-menagment-box">
					<a href="#" class="order-position-delete" id_position="<?=$position->id?>">Удалить</a><br>
					<a href="/order_position/edit?id_position=<?=$position->id?>">Редактировать</a>
				</td>
			</tr>
			<? $number++ ?>
		<? endforeach; ?>
	<? else: ?>
		<tr>
			<td colspan="4" class="red">Позиций нет</td>
		</tr>
	<? endif; ?>
</table>