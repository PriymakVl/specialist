<table class="list-orders" width="940">
    <tr>
        <th width="40">
            <input type="checkbox" disabled>
        </th>
        <th width="180">ФИО</th>
        <th width="180">Загрузка</th>
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
                    <a href="/statistics/worker_made?id_worker=<?=$worker->id?>"><?=$worker->title?></a>
                </td>
                <td>
					<? if ($worker->loadPercent): ?>
						<span><?=$worker->loadPercent?>%</span>
					<? else: ?>
						<span class="red">Простой</span>
					<? endif; ?>
				</td>
                <td>
					<? if ($worker->loadTimePlan): ?>
						<span><?=$worker->loadTimePlan?> мин.</span>
					<? else: ?>
						<span class="red">Простой</span>
					<? endif; ?>
				</td>
				<td>
					<? if ($worker->timeMade): ?>
						<span><?=$worker->timeMade?> мин.</span>
					<? else: ?>
						<span class="red">Нет</span>
					<? endif; ?>
				<td><?=$worker->costMade ? $worker->costMade : '0'?> грн.</td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="5" style="color: red;">Рабочих нет</td>
        </tr>
    <? endif; ?>
</table>