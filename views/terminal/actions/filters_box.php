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
	<!-- filter type order -->
	<div id="filter-type-order-wrp">
		<select id="filter-type-order">
			<option value="<?=Order::TYPE_CYLINDER?>">Пневмо</option>
			<option value="<?=Order::TYPE_CAR_NUMBER?>" <? if ($this->get->type_order == Order::TYPE_CAR_NUMBER) echo 'selected';?>>Пресса и накатки</option>
		</select>
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