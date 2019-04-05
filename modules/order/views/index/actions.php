<li id="order-actions-wrp">
    <input type="radio" name="tabs" id="tab-3" <? if ($this->get->tab == 3) echo 'checked'; ?>>
    <label for="tab-3">Операциии</label>
    <div class="tab-content">
		<h3>Заказ: <span class="red"><?=$order->symbol?></span></h3>
		<!-- plan actions -->
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
							<td><?=$action->product->options->symbol?></td>
							<td><?=$action->product->options->name?></td>
							<td><?=$action->qty?></td>
							<td><?=$action->name?></td>
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