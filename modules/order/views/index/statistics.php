<li>
    <input type="radio" name="tabs" id="tab-3">
    <label for="tab-3">Статистика</label>
    <div class="tab-content">

        <table>
            <tr>
                <th width="30">№</th>
                <th width="60">Дата</th>
                <th width="150">Состояние</th>
                <th>Примечание</th>
            </tr>
			<? if (isset($states)): ?>
				<? foreach ($states as $item): ?>
					<tr>
						<td>1</td>
						<td><?=$item->date?></td>
						<td><?=$item->stateName?></td>
						<td>Какое то примечание</td>
					</tr>
				<? endforeach; ?>
			<? endif; ?>
        </table>

    </div>
</li>