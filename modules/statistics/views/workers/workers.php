<table class="list-orders" width="940">
    <tr>
        <th width="40">
            <input type="checkbox" disabled>
        </th>
        <th width="180">ФИО</th>
        <th width="180">Разница</th>
        <th width="180">Трудоемкость план</th>
		<th width="180">Трудоемкость факт</th>
		<th>Заработал</th>
    </tr>
    <? if ($workers): ?>
        <?foreach ($workers as $worker): ?>
            <tr>
                <td>
                    <input type="checkbox" name="worker" id_worker="<?=$worker->id?>">
                </td>
                <td>
                    <a href="/statistics/worker?id_worker=<?=$worker->id?>"><?=$worker->title?></a>
                </td>
                <td>
					<? if ($worker->differenceTime): ?>
						<span class="<?=($worker->differenceTime>0)?'green':'red'?>"><?=$worker->differenceTime?> мин.</span>
					<? else: ?>
						<span class="red">Нет</span>
					<? endif; ?>
				</td>
				<td>
					<? if ($worker->timePlanMade): ?>
						<? if ($worker->timePlanMadeDivision && $worker->timePlanMadeDivision->hours): ?>
							<?=$worker->timePlanMadeDivision->hours?> ч. <?=$worker->timePlanMadeDivision->minutes?> мин.
						<? else: ?>
							<?=$worker->timePlanMade?> мин.
						<? endif; ?>
					<? else: ?>
						<span class="red">Нет</span></td>
					<? endif; ?>
                <td>
					<? if ($worker->timeFact): ?>
						<? if ($worker->timeFactDivision && $worker->timeFactDivision->hours): ?>
							<?=$worker->timeFactDivision->hours?> ч. <?=$worker->timeFactDivision->minutes?> мин.
						<? else: ?>
							<?=$worker->timeFact?> мин.
						<? endif; ?>
					<? else: ?>
						<span class="red">Нет</span>
					<? endif; ?>
				</td>
				<td><?=$worker->cost ? $worker->cost.' грн.' : '<span class="red">Нет</span>'?></td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="5" style="color: red;">Рабочих нет</td>
        </tr>
    <? endif; ?>
</table>