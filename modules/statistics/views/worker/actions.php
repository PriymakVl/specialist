<?php 
	$number = 1;
?>

<h2>Статистика по операциям</h2>
<table class="action-list" width="940">
    <tr>
        <th width="50">№</th>
        <th width="100">Заказ</th>
        <th width="200">Продукт</th>
		<th width="180">Операция</th>
		<th width="80">Кол-во</th>
		<th width="100">Труд. планов</th>
		<th>Труд. фактич</th>
		<th>Примечание</th>
    </tr>
    <? if ($worker->actionsMade): ?>
        <?foreach ($worker->actionsMade as $action): ?>
            <tr>
                <td><?=$number?></td>
				<!-- order -->
                <td>
					<? if ($action->order): ?>
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
						<? if ($action->timePlanDivision): ?>
								<? printf("%uчас. %uмин.", $action->timePlanDivision->hours, $action->timePlanDivision->minutes); ?>
							<? else: ?>
								<? printf('%uмин.', $action->timePlan); ?>
							<? endif; ?>
					<? else: ?>
						<span class="red">Нет</span>
					<? endif; ?>
				</td>
				<!-- time fact -->
				<!-- determine color time fact -->
				<? $color = ($action->timePlan && $action->timeFact && $action->timeFact > $action->timePlan) ? 'red' : 'green'; ?>
				<td>
					<? if ($action->timeFact && $action->states): ?>
						<a href="/order_action/state_list?id_action=<?=$action->id?>&type=plan" style="color:<?=$color?>">
							<? if ($action->timeFactDivision): ?>
								<? printf("%uчас. %uмин.", $action->timeFactDivision->hours, $action->timeFactDivision->minutes); ?>
							<? else: ?>
								<? printf('%uмин.', $action->timeFact); ?>
							<? endif; ?>
						</a>
					<? elseif ($action->states): ?>
						<a href="/order_action/state_list?id_action=<?=$action->id?>&type=plan">~ 1 мин.</a>
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