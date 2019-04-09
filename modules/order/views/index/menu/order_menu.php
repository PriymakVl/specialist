<?
	$hidden_order_menu = false;
	if ($order->products || $order->actions) $hidden_order_menu = true;
	if ($this->get->tab && $this->get->tab != 1) $hidden_order_menu = true;
?>

<ul id="order-menu-wrp" <? if ($hidden_order_menu) echo 'style="display:none;"'; ?>>
	<li>
		<a href="/order/edit?id_order=<?=$order->id?>">Редактировать заказ</a>
	</li>
	<li>
		<a href="#" id_order="<?=$order->id?>" id="order-delete">Удалить заказ</a>
	</li>
	<br>
	<li>
		<a href="/order/edit_state?id_order=<?=$order->id?>">Редакт-ть состояние</a>
	</li>
	<? if ($this->session->id_order_active != $order->id): ?>
		<li><a href="/order/activate?id_order=<?=$order->id?>">Сделать активным</a></li>
	<? endif; ?>
	<br>
	<!-- order position menu -->
	<li>
		<a href="/order_position/add?id_order=<?=$order->id?>">Добавить позицию</a>
	</li>
	<!-- add order product -->
	<? if (!$order->products): ?>
		<li>
			<a href="/order_product/add?id_order=<?=$order->id?>">Добавить продукт</a>
		</li>
	<? endif; ?>
	<!-- add order action -->
	<? if (!$order->actions): ?>
		<li>
			<a href="/order_action/add?id_order=<?=$order->id?>">Добавить операцию</a>
		</li>
	<? endif; ?>
</ul>
