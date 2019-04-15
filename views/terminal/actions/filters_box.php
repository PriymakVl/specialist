<?php
	$default_actions = Action::getAll('actions');
	//$orders = OrderAction::getOrdersForTerminal();
	$orders = false;
	$name_action = $this->get->action ? trim($this->get->action) : $worker->options->default_action;
?>
<div id="filters-wrp">
	<!-- filter actions -->
	<div id="filter-actions-wrp">
		<form action="/terminal/action">
			<select id="filter-actions">
				<option value="all">Все операции</option>
				<? foreach ($default_actions as $item): ?>
					<option <? if ($item->name == $name_action) echo 'selected'; ?> value="<?=$item->name?>"><?=$item->name?></option>
				<? endforeach; ?>
				<option value="other">Разные</option>
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