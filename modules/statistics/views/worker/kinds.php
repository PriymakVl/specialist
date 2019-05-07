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
		<th width="180">Наименование операция</th>
		<th width="80">Кол-во</th>
		<th width="100">Труд. планов</th>
		<th width="100">Труд. фактич</th>
    </tr>
    <? if ($worker->actionsFact): ?>
        <?foreach ($worker->actionsFact as $action): ?>
            <tr>
                <td><?=$number?></td>
				<!-- order -->
                <td>
					<? if ($action->id_order): ?>
						<a href="/order?id_order=<?=$action->order->id?>"><?=$action->order->symbol?></a>
					<? else: ?>
						<span class="red">Нет заказа</span>
					<? endif; ?>
				</td>
				<!-- product -->
                <td>
					<? if ($action->product): ?>
						<a href="/order_product?id_prod=<?=$action->product->id?>">
							<?=$action->product->symbol, ' : ', $action->product->name?>
						</a>
					<? else: ?>
						<span class="red">Нет продукта</span>
					<? endif; ?>
				</td>
				<!-- name action -->
				<td><?=$action->name?></td>
				<!-- action quantity -->
				<td><?=$action->qty?></td>
				<!-- time plan -->
				<td>
					<? if ($action->timePlan): ?>
						<?=$action->timePlan?> мин.
					<? else: ?>
						<span class="red">Нет</span>
					<? endif; ?>
				</td>
				<!-- time fact -->
				<td>
					<? if ($action->timeFact && $action->states): ?>
						<a href="/order_action/state_list?id_action=<?=$action->id?>&type=plan"><?=$action->timeFact.'мин.'?></a>
					<? elseif ($action->states): ?>
						<a href="/order_action/state_list?id_action=<?=$action->id?>&type=plan">Меньше минуты</a>
					<? else: ?>
						<span class="red">Нет</span>
					<? endif; ?>
				</td>
				<!-- note -->
				<td><?=$action->note?></td>
            </tr>
			<? $number++; ?>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="8" class="red">Простой</td>
        </tr>
    <? endif; ?>
</table>