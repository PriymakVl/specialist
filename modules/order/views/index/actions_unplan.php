<li id="order-actions-wrp">
    <input type="radio" name="tabs" id="tab-4" checked>
    <label for="tab-4">Дополн. операции</label>
    <div class="tab-content">
		<h3>
			Заказ: <span class="red"><?=$order->symbol?></span>
			<span class="green" style="margin-left: 20px;">Дополнительные операции</span>
		</h3>
		<!-- unplan actions -->
			<table width="940">
					<tr>
						<th width="50"><input type="checkbox" disabled></th>
						<th width="150">Обозначение</th>
						<th width="200">Наименование</th>
						<th width="80">Кол-во</th>
						<th width="200">Операция</th>
						<th>Состояние</th>
					</tr>
					<? foreach($order->actionsUnplan as $action): ?>
						<tr>
							<td><input type="radio" id_action="<?=$action->id?>" name="actions_unplan"></td>
							<td><?=$action->prod_symbol?></td>
							<td><?=$action->prod_name?></td>
							<td><?=$action->qty?></td>
							<td><?=$action->action_name?></td>
							<td style="background:<?=$action->bgState?>">
								<? if ($action->state > OrderActionState::PLANED): ?>
									<a href="/order_action/state_list?id_action=<?=$action->id?>&type=unplan"><?=$action->convertState?></a>
								<? else: ?>
									<?=$action->convertState?>
								<? endif; ?>
							</td>
						</tr>
					<? endforeach; ?>
			</table>
    </div>
</li>