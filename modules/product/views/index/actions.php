<li>
    <input type="radio" name="tabs" id="tab-3" checked>
    <label for="tab-3">Операции</label>
    <div class="tab-content">
		<h2><?=$product->name?>: <span class="green"><?=$product->symbol?></span></h2>
        <table width="900">
			<tr>
				<th width="40">№</th>
				<th width="200">Наименование</th>
				<th width="150">Подготов. время</th>
				<th width="150">Штучное время</th>
				<th>Примечание</th>
				<th width="100">Управление</th>
			</tr>
			<? foreach($product->actions as $prod_action): ?>
				<tr>
					<td><?=$prod_action->number?></td>
					<td><?=$prod_action->name?></td>
					<td>
						<? if ($prod_action->time_prepar): ?>
							<?=$prod_action->time_prepar?> мин.
						<? else: ?>
							<span class="red">Нет</span>
						<? endif; ?>
					</td>
					<td>
						<? if ($prod_action->time_prod): ?>
							<?=$prod_action->time_prod?> мин.
						<? else: ?>
							<span class="red">Нет</span>
						<? endif; ?>
					</td>
					<td></td>
					<td class="action-control-box">
						<a href="/prodaction/edit?id_prod_action=<?=$prod_action->id?>&id_prod=<?=$product->id?>">Редактировать</a><br>
						<a href="/prodaction/delete?id_prod_action=<?=$prod_action->id?>">Удалить</a>
					</td>
				</tr>
				<? $number++; ?>
			<? endforeach; ?>
        </table>
    </div>
</li>