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
			<span>Заказ: </span><a href="/order?id_order=<?=$product->order->id?>" style="margin-right: 20px; color:green;"><?=$product->order->symbol?></a>
			<?=$product->name?>: <span class="green"><?=$product->symbol?></span>
		</h2>
        <table width="900">
			<tr>
				<th width="40">
					<input type="checkbox" disabled>
				</th>
				<th width="40">№</th>
				<th width="200">Наименование</th>
				<th width="100">Подг. время</th>
				<th width="100">Штуч. время</th>
				<th width="100">Факт. время</th>
				<th>Примечание</th>
				<th width="100">Состояние</th>
			</tr>
			<? foreach($product->actions as $action): ?>
				<tr>
					<td>
						<input type="radio" name="actions" id_action="<?=$action->id?>">
					</td>
					<!-- number -->
					<td><?=$action->number?></td>
					<!-- name -->
					<td><?=$action->name?></td>
					<!-- time preparation -->
					<td>
						<? if ($action->time_prepar): ?>
							<?=$action->time_prepar?> мин.
						<? else: ?>
							<span class="red">Нет</span>
						<? endif; ?>
					</td>
					<!-- time production -->
					<td>
						<? if ($action->time_prod): ?>
							<?=$action->time_prod?> мин.
						<? else: ?>
							<span class="red">Нет</span>
						<? endif; ?>
					</td>
					<!-- fact time -->
					<td><span class="red">Нет</span></td>
					<!-- note -->
					<td><?=$action->note?></td>
					<!-- state -->
					<td style="background:<?=$action->stateBg?>">
						<? if (!$action->states): ?>
							<?=$action->stateString?>
						<? else: ?>
							<a href="/order_action/state_list?id_action=<?=$action->id?>&type=plan"><?=$action->stateString?></a>
						<? endif; ?>
					</td>
				</tr>
			<? endforeach; ?>
        </table>
    </div>
</li>