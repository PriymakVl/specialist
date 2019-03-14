<?php 
	$number = 1;
?>
<!-- total time -->
<? if ($worker->actions): ?>
	<table width="940">
		<tr>
			<th width="300">Общая трудоемкость плановая</th>
			<th width="300">Общая трудоемкость фактическая</th>
			<th>Заработал</th>
		</tr>
		<tr>
			<td><?=$worker->totalTimePlan?></td>
			<td><?=$worker->totalTimeMade?></td>
			<td><?=$worker->costMade?></td>
		<tr>
	<table>
	<br>
<? endif; ?>

<!-- list actions -->
<table class="action-list" width="940">
    <tr>
        <th width="50">№</th>
        <th width="100">Заказ</th>
        <th width="250">Деталь</th>
		<th width="180">Операция</th>
		<th width="100">Труд. планов</th>
		<th width="100">Труд. фактич</th>
    </tr>
    <? if ($worker->actions): ?>
        <?foreach ($worker->actions as $action): ?>
            <tr>
                <td><?=$number?></td>
                <td>
					<a href="/order?id_order=<?=$action->order->id?>"><?=$action->order->symbol?></a>
				</td>
                <td>
					<a href="/product?id_prod=<?=$action->product->id?>"><?=$action->product->symbol?></a> 
					<?=$action->product->name?> 
					(<?=$action->qty?> шт.)
				</td>
				<td><?=$action->name?></td>
				<td><?=$action->time_manufac?> мин.</td>
				<td>
					<? if ($action->timeMade): ?>
						<a href="/order_action/state_list?id_action=<?=$action->id?>&type=plan"><?=$action->timeMade.'мин.'?></a>
					<? elseif ($actions->states): ?>
						<a href="/order_action/state_list?id_action=<?=$action->id?>&type=plan">Меньше минуты</a>
					<? else: ?>
						<span class="red">Нет</span>
					<? endif; ?>
					<? if ($action->note): ?>
						<a href="#" class="show-action-note" note="<?=$action->note?>">Примечание</a>
					<? endif; ?>
				</td>
            </tr>
			<? $number++; ?>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="6" class="red">Простой</td>
        </tr>
    <? endif; ?>
</table>