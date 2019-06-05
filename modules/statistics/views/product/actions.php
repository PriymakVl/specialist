<?php 
	$number = 1;
?>

<table class="action-list" width="940">
    <tr>
        <th width="50">№</th>
		<th width="220">Операция</th>
		<th width="70">Кол-во</th>
		<th width="120">Время план.</th>
		<th width="120">Время факт.</th>
		<th width="120">Время сред.</th>
		<th>Примечание</th>
    </tr>
    <? if ($product->actions): ?>
        <?foreach ($product->actions as $action): ?>
            <tr>
                <td><?=$number?></td>
				<!-- name action -->
				<td>
					<?=$action->name?>
				</td>
				<!-- action quantity -->
				<td><?printf('%uшт.',$action->qty)?></td>
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
				<td>
					<? if ($action->timeAverage): ?>
						<? if ($action->timeAverageDivision): ?>
								<? printf("%uчас. %uмин.", $action->timeAverageDivision->hours, $action->timeAverageDivision->minutes); ?>
							<? else: ?>
								<? printf('%uмин.', $action->timeAverage); ?>
							<? endif; ?>
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
            <td colspan="6" class="red">Нет</td>
        </tr>
    <? endif; ?>
</table>