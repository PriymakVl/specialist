<ul id="menu-order">
	<li><a href="/order/edit?id_order=<?=$order->id?>">Редактировать заказ</a></li>
	<li><a href="#" id_order="<?=$order->id?>" id="order-delete">Удалить заказ</a></li>
	<? if ($this->session->id_order_active != $order->id): ?>
		<li><a href="/order/activate?id_order=<?=$order->id?>">Сделать активным</a></li>
	<? endif; ?>
</ul>