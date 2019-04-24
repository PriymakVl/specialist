<div id="plan-actions-wrp">
	<table width="940">
			<tr>
				<th width="50"><input type="checkbox" disabled></th>
				<th width="100">Заказ</th>
				<th width="200">Продукт</th>
				<th width="180">Операция</th>
				<th width="80">Кол-во</th>
				<th colspan="2" >
					<table class="table-date">
						<tr>
							<td colspan="2" class="table-date-header">Срок изгот.</td>
						<tr>
						<tr>
							<td class="table-date-plan">план</td>
							<td class="table-date-fact">факт</td>
						<tr>
					</table>
				</th>
				<th width="70">Рейтинг</th>
				<th>Состояние</th>
			</tr>
			<? foreach($actions as $action): ?>
				<tr>
					<td <?if ($this->session->id_action_active == $action->id) echo 'class="bg-green"'; ?>>
						<input type="radio" id_action="<?=$action->id?>" name="actions"></td>
					<td>
						<a href="/order?id_order=<?=$action->order->id?>"><?=$action->order->symbol?></a>
					</td>
					<td>
						<? if ($action->product): ?>
							<a href="/order_product?id_prod=<?=$action->product->id?>">
								<?=$action->product->symbol, ' : ', $action->product->name?>
							</a>
						<? else: ?>
							<span class="red">Нет продукта</span>
						<? endif; ?>
					</td>
					<td><?=$action->name?></td>
					<td><?=$action->qty?></td>
					<td><?=$action->date_exec ? date('d.m.y', $action->date_exec) : '<span class=red>Нет</span>'?></td>
					<td <? if ($action->date_exec + Date::DAY_WORKING_SECOND < $action->dateReady) echo 'class="bg-red"';?>>
						<?=date('d.m.y', $action->dateReady)?>
					</td>
					<td>
						<a href="#" class="action-rating" id_action="<?=$action->id?>"><?=$action->rating ? $action->rating : 0?></a>
					</td>
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
</li>