<?
	$hidden_order_actions_menu = true;
	if (!$order->productsMain && $order->actions) $hidden_order_actions_menu = false;
	if ($this->get->tab && $this->get->tab != 3) $hidden_order_actions_menu = true;
	if ($this->get->tab == 3) $hidden_order_actions_menu = false;
?>

<ul id="order-actions-menu-wrp" <? if ($hidden_order_actions_menu) echo 'style="display:none;"'; ?>>
	<li>
		<a href="/order_action/add_for_order?id_order=<?=$order->id?>">Добавить операцию</a>
	</li>
	<li>
		<a href="#" id="order-action-edit" id_order="<?=$order->id?>">Редакт-ть операцию</a>
	</li>
	<li>
		<a href="#" id_order="<?=$order->id?>" id="order-action-delete">Удалить операцию</a>
	</li>
	<br>
	<li>
		<a href="#" id="order-action-edit-state" id_order="<?=$order->id?>">Редак-ть состояние</a>
	</li>
</ul>
