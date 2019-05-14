<?php
	$number = 1;
?>
<table class="list-orders" width="940">
    <tr>
        <th width="40">№</th>
        <th width="120">ФИО</th>
		<th>Текущая операция</th>
		<th>Следующая операция</th>
        <th>Загрузка в часах</th>
        <th>Загрузка в %</th>
    </tr>
    <? if ($workers): ?>
        <?foreach ($workers as $worker_one): ?>
            <tr>
                <td><?=$number?></td>
                <td>
                    <a href="/plan/workers?id_user=<?=$worker_one->id?>&type_order=<?=$this->get->type_order?>"><?=$worker_one->title?></a>
                </td>
                <!-- current actions -->
				<td class="left">
					<? if ($worker_one->currentActions): ?>
						<? foreach ($worker_one->currentActionsString as $action_current_str): ?>
							<?=$action_current_str?><br>
						<? endforeach; ?>
					<? else: ?>
						<span class="red">Простой</span>
					<? endif; ?>
				</td>
				<!-- plan action -->
				<td class="left">
					<? if ($worker_one->firstActionPlanString): ?>
						<?=$worker_one->firstActionPlanString?>
					<? else: ?>
						<span class="red">Простой</span>
					<? endif; ?>
				</td>
				<!-- time load minutes -->
				<td>
					<? if ($worker_one->timePlanHour): ?>
						<span style="font-weight: bold;"><?=$worker_one->timePlanHour->hours?>ч <?=$worker_one->timePlanHour->minutes?>мин</span>
					<? elseif ($worker_one->timePlan): ?>
						<?=$worker_one->timePlan?>мин
					<? else: ?>
						<span class="red">Не указана</span>
					<? endif; ?>
				</td>
				<!-- time load persent -->
				<td><? if ($worker_one->timePlanPercent) echo '<span style="font-weight: bold;">', $worker_one->timePlanPercent, '%</span>';?></td>
			</tr>
			<? $number++; ?>
        <? endforeach; ?>
	<? endif; ?>
</table>