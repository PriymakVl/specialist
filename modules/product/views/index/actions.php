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
			<? foreach($product->actions as $action): ?>
				<tr>
					<td><?=$action->number?></td>
					<td><?=$action->name?></td>
					<td>
						<? if ($action->time_prepar): ?>
							<?=$action->time_prepar?> мин.
						<? else: ?>
							<span class="red">Нет</span>
						<? endif; ?>
					</td>
					<td>
						<? if ($action->time_prod): ?>
							<?=$action->time_prod?> мин.
						<? else: ?>
							<span class="red">Нет</span>
						<? endif; ?>
					</td>
					<td><?=$action->note?></td>
					<td class="action-control-box">
						<a href="/product_action/edit?id=<?=$action->id?>&id_prod=<?=$product->id?>">Редактировать</a><br>
						<a href="#" class="product-action-delete" id_action="<?=$action->id?>">Удалить</a>
					</td>
				</tr>
				<? $number++; ?>
			<? endforeach; ?>
        </table>
    </div>
</li>