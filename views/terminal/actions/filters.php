<?php
	$default_actions = Action::getAll('actions');
	$orders = (new Order)->getForTerminal();
	$type_order = $this->get->type_order ? $this->get->type_order : $worker->defaultTypeOrder;
?>

<div id="filters-wrp">
	<!-- filter actions -->
	<div id="filter-actions-wrp">
		<form action="/terminal/action">
			<select id="filter-actions">
				<option value="my" <? if (!$this->get->action == 'my') echo 'selected'; ?>>Мои</option>
				<option value="" <? if (!$this->get->action) echo 'selected'; ?>>Все операции</option>
				<? foreach ($default_actions as $item): ?>
					<option <? if ($item->name == $this->get->action) echo 'selected'; ?> value="<?=$item->name?>"><?=$item->name?></option>
				<? endforeach; ?>
				<option value="other" <? if ($this->get->action == 'other') echo 'selected'; ?>>Разные</option>
			</select>
		</form>
	</div>

	<!-- filter type order -->
	<div id="filter-type-order-wrp">
		<select id="filter-type-order">
			<option value="<?=Order::TYPE_CYLINDER?>">Пневмо</option>
			<option value="<?=Order::TYPE_CAR_NUMBER?>" <? if ($type_order == Order::TYPE_CAR_NUMBER) echo 'selected';?>>Пресса и накатки</option>
		</select>
	</div>

	<!-- filter orders -->
	<div id="filter-orders-wrp">
		<select id="filter-orders">
			<option value="all">Все заказы</option>
			<? if ($orders): ?>
				<? foreach ($orders as $order): ?>
					<option <? if ($order->id == $this->get->id_order) echo 'selected'; ?> value="<?=$order->id?>"><?=$order->symbol?></option>
				<? endforeach; ?>
			<? endif; ?>
		</select>
	</div>
</div>