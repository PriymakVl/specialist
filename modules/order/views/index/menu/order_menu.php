<ul id="order-menu-wrp" <? if ($order->products || $order->actions || $this->get->tab != 1) echo 'style="display:none;"'; ?>>
	<li>
		<a href="/order/edit?id_order=<?=$order->id?>">Редактировать заказ</a>
	</li>
	<li>
		<a href="#" id_order="<?=$order->id?>" id="order-delete">Удалить заказ</a>
	</li>
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
</ul>
