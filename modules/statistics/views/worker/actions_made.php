<?php 
	$number = 1;
?>
<table class="action-list" width="940">
    <tr>
        <th width="50">№</th>
        <th width="100">Заказ</th>
        <th width="250">Деталь</th>
		<th width="180">Операция</th>
		<th width="100">Труд. планов</th>
		<th width="100">Труд. фактич</th
    </tr>
    <? if ($worker->actions): ?>
        <?foreach ($worker->actions as $action): ?>
            <tr>
                <td><?=$number?></td>
                <td><?=$action->order->symbol?></td>
                <td><?=$action->product->symbol?> <?=$action->product->name?> (<?=$action->qty?> шт.)</td>
				<td><?=$action->name?></td>
				<td><?=$action->time_manufac?> мин.</td>
				<td><?=$action->timeMade ? $action->timeMade.'мин.' : '<span class="red">Нет</span>'?></td>
            </tr>
			<? $number++; ?>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="6" class="red">Простой</td>
        </tr>
    <? endif; ?>
</table>