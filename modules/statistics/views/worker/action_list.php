<?php 
	$number = 1;
?>
<table class="action-list" width="940">
    <tr>
        <th width="50">№</th>
        <th width="100">Заказ</th>
        <th width="250">Деталь</th>
		 <th width="80">Кол-во</th>
		<th width="180">Операция</th>
		<th width="180">Трудоемкость</th
    </tr>
    <? if ($worker->actionsPlan): ?>
        <?foreach ($worker->actionsPlan as $order_action): ?>
            <tr>
                <td><?=$number?></td>
                <td><?=$order_action->order->symbol?></td>
                <td><?=$order_action->product->symbol?> <?=$order_action->product->name?></td>
				<td><?=$order_action->qty?> шт.</td>
				<td><?=$order_action->action->name?></td>
				<td><?=$order_action->time_manufac?> мин.</td>
            </tr>
			<? $number++; ?>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="4" style="color: red;">Простой</td>
        </tr>
    <? endif; ?>
</table>