<? if ($order->state == OrderState::PREPARATION && $order->content): ?>
	<ul id="menu-order-content">
		<li><a href="#" id="content_delete" id_order="<?=$order->id?>">Удалить позиции</a></li>
	</ul>
<? endif; ?>