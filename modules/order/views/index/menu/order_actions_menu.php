<?
	$hidden_order_actions_menu = true;
	if (!$order->products && $order->actions) $hidden_order_menu = false;
	if ($this->get->tab && $this->get->tab != 3) $hidden_order_menu = false;
?>

<ul id="order-actions-menu-wrp" <? if ($hidden_order_actions_menu) echo 'style="display:none;"'; ?>>
	<li>
		<a href="/order_products/add?<?=$order->id?>">Добавить операцию</a>
	</li>
	<li>
		<a href="#" id="add-order-action" id_order="<?=$order->id?>">Редактир-ть операцию</a>
	</li>
	<li>
		<a href="#" id_order="<?=$order->id?>" id="delete-order-action">Удалить операцию</a>
	</li>
</ul>
