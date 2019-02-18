<div id="menu-order-wrp">
	<!-- menu order -->
    <ul id="menu-order" style="display:none;">
        <li><a href="/order/edit?id_order=<?=$order->id?>">Редактировать</a></li>
        <li><a href="#" id_order="<?=$order->id?>" id="order-delete">Удалить заказ</a></li>
		<? if ($id_active != $order->id): ?>
			<li><a href="/order/activate?id_order=<?=$order->id?>">Сделать активным</a></li>
		<? endif; ?>
		<li><a href="/order/add_position?id_order=<?=$order->id?>">Добавить позицию</a></li>
    </ul>
	
	<!-- menu order content -->
	<ul id="menu-order-content" >
        <li><a href="#" id="content_delete" id_order="<?=$order->id?>">Удалить позиции</a></li>
		<li><a href="/order/to_work?id_order=<?=$order->id?>">Выдать в работу</a></li>
    </ul>
</div>