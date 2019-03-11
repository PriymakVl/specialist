<?php 
	$number = 1;
?>
<table class="action-list" width="940">
    <tr>
        <th width="50">№</th>
        <th width="100">Заказ</th>
        <th width="400">Деталь</th>
		<th width="200">Операция</th>
		<th >Труд. планов</th>
    </tr>
    <? if ($worker->actions): ?>
        <?foreach ($worker->actions as $action): ?>
            <tr>
                <td><?=$number?></td>
                <td><?=$action->order->symbol?></td>
                <td><?=$action->product->symbol?> <?=$action->product->name?> (<?=$action->qty?> шт.)</td>
				<td><?=$action->name?></td>
				<td><?=$action->time_manufac?> мин.</td>
            </tr>
			<? $number++; ?>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="6" class="red">Простой</td>
        </tr>
    <? endif; ?>
</table>