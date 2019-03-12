<?php
	$all_actions = DataAction::getAll('data_actions');
	$orders = OrderAction::getOrdersForTerminal();
	$id_order = empty($params['order']) ? 'all' : $params['order'];
?>
<div id="filters-wrp">
	<!-- filter actions -->
	<div id="filter-actions-wrp">
		<form action="/terminal/action">
			<select id="filter-actions">
				<option value="all">Все операции без дополн.</option>
				<? foreach ($all_actions as $item): ?>
					<option <? if ($item->id == $params['action']) echo 'selected'; ?> value="<?=$item->id?>"><?=$item->name?></option>
				<? endforeach; ?>
				<option value="unplan" <? if ($params['action'] == 'unplan') echo 'selected';?>>Дополнительные операц.</option>
			</select>
		</form>
	</div>
	<!-- filter orders -->
	<div id="filter-orders-wrp">
		<select id="filter-orders">
			<option value="all">Все заказы</option>
			<? if ($orders): ?>
				<? foreach ($orders as $order): ?>
					<option <? if ($order->id == $id_order) echo 'selected'; ?> value="<?=$order->id?>"><?=$order->symbol?></option>
				<? endforeach; ?>
			<? endif; ?>
		</select>
	</div>
</div>