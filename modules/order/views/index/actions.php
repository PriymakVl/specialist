<li id="order-actions-wrp">
    <input type="radio" name="tabs" id="tab-3" checked>
    <label for="tab-3">Операциии</label>
    <div class="tab-content">
		
		<!-- plan actions -->
		<? if ($order->actions): ?>
			<table width="940">
					<tr>
						<th width="50"><input type="checkbox" disabled></th>
						<th width="150">Обозначение</th>
						<th width="200">Наименование</th>
						<th width="80">Кол-во</th>
						<th width="200">Операция</th>
						<th>Состояние</th>
					</tr>
					<? foreach($order->actions as $action): ?>
						<tr>
							<td><input type="radio" id_action="<?=$action->id?>" name="actions"></td>
							<td><?=$action->product->symbol?></td>
							<td><?=$action->product->name?></td>
							<td><?=$action->qty?></td>
							<td><?=$action->action->name?></td>
							<td style="background:<?=$action->bgState?>"><?=$action->convertState?></td>
						</tr>
					<? endforeach; ?>
			</table>
		<? endif; ?>
		
		<!-- unplan actions -->
		<? if ($order->actionsUnplan): ?>
			<table width="940">
					<caption>Внеплановые операции</caption>
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
							<td style="background:<?=$action->bgState?>"><?=$action->convertState?></td>
						</tr>
					<? endforeach; ?>
			</table>
		<? endif; ?>
    </div>
</li>