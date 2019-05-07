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
					<span class="red">Нет</span>
				</td>
                <td>
					<? if ($worker->timeFact): ?>
						<?=$worker->timeFact?> мин.
					<? else: ?>
						<span class="red">Простой</span>
					<? endif; ?>
				</td>
				<td><span class="red">Нет</span></td>
				<td><?=$worker->costMade ? $worker->costMade : '0'?> грн.</td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="5" style="color: red;">Рабочих нет</td>
        </tr>
    <? endif; ?>
</table>