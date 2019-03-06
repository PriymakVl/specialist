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
                <td><?=$action->product->symbol?> <?=$action->product->name?> (<?=$order_action->qty?> шт.)</td>
				<td><?=$action->action->name?></td>
				<td><?=$action->time_manufac?> мин.</td>
				<td>факт трудоем</td>
            </tr>
			<? $number++; ?>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="6" class="red">Простой</td>
        </tr>
    <? endif; ?>
</table>