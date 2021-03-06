<?
	$number = 1;
?>
<div id="plan-actions-wrp">
	<table class="plan-table">
		<? if ($actions): ?>
			<tr>
				<th width="40"><input type="checkbox" disabled></th>
				<th width="40">№</th>
				<th width="100">Заказ</th>
				<th width="200">Продукт</th>
				<th>Операция</th>
				<th width="80">Кол-во</th>
				<th colspan="2" style="padding:0;">
					<table class="table-date">
						<tr><td colspan="2" class="table-date-header">Срок изгот.</td></tr>
						<tr>
							<td class="table-date-plan">план</td>
							<td class="table-date-fact">факт</td>
						</tr>
					</table>
				</th>
				<th width="70">Рейтинг</th>
				<th>Состояние</th>
				<th width="90">Раб-ник</th>
			</tr>
				<? foreach($actions as $action): ?>
					<tr>
						<td <?if ($this->get->id_active == $action->id) echo 'class="bg-green"'; ?>>
							<input type="radio" id_action="<?=$action->id?>" name="actions">
						</td>
						<td><?=$number;?></td>
						<td>
							<? if ($action->order): ?>
								<a href="/order?id_order=<?=$action->order->id?>"><?=$action->order->symbol?></a>
							<? else: ?>
								<span class="red">Нет заказа</span>
							<? endif; ?>
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
						<!-- action name -->
						<td>
							<?=$action->name?>
							<? if ($action->note): ?>
								<br><span class="action-note"><?=$action->note?></span>
							<? endif; ?>
						</td>
						<!-- quantity -->
						<td><?=$action->qty?></td>
						<!-- date plan -->
						<td style="width:75px;padding:0;"><?=$action->date_exec ? date('d.m.y', $action->date_exec) : '<span class=red>Нет</span>'?></td>
						<!-- date fact -->
						<td style="width:75px;padding:0;" <? if ($action->date_exec && $action->dateReady && ($action->date_exec + Date::DAY_WORKING_SECOND < $action->dateReady)) echo 'class="bg-red"';?>>
							<?=$action->dateReady ? date('d.m.y', $action->dateReady) : ''?>
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
						<td id="worker-cell"><?=$action->worker?$action->worker->title:''?></td>
					</tr>
					<? $number++; ?>
				<? endforeach; ?>
			<? else: ?>
				<tr><td class="red">Операций нет</td></tr>
			<? endif; ?>
	</table>
</li>