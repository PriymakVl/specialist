<?php
	$tab_3 = false;
	if ($this->get->tab == 3) $tab_3 = true;
	if (!$product->specificationGroup) $tab_3 = true;
?>
<li>
    <input type="radio" name="tabs" id="tab-3" <? if ($tab_3) echo 'checked'; ?>>
    <label for="tab-3">Операции</label>
    <div class="tab-content">
		<h2>
			<span>Заказ: </span><a href="/order?id_order=<?=$product->order->id?>"><?=$product->order->symbol?></a>&nbsp; &nbsp; &nbsp;
			<?=$product->options->name?>: <span class="green"><?=$product->options->symbol?></span>
		</h2>
        <table width="900">
			<tr>
				<th width="40">
					<input type="checkbox" disabled>
				</th>
				<th width="200">Наименование</th>
				<th width="120">Подг. время</th>
				<th width="120">Штуч. время</th>
				<th width="120">Факт. время</th>
				<th>Примечание</th>
				<th width="100">Состояние</th>
			</tr>
			<? foreach($product->actions as $action): ?>
				<tr>
					<td>
						<input type="radio" name="action">
					</td>
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
					<td>fact time</td>
					<td><?=$action->note?></td>
					<td>Не выдан</td>
				</tr>
			<? endforeach; ?>
        </table>
    </div>
</li>