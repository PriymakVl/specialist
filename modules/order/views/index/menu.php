<div id="menu-order-wrp">
	<!-- menu order -->
    <ul id="menu-order" <? if ($order->content) echo 'style="display:none;"'?>>
        <li><a href="/order/edit?id_order=<?=$order->id?>">Редактировать</a></li>
        <li><a href="#" id_order="<?=$order->id?>" id="order-delete">Удалить заказ</a></li>
		<? if ($id_active != $order->id && $order->state != OrderState::REGISTERED): ?>
			<li><a href="/order/activate?id_order=<?=$order->id?>">Сделать активным</a></li>
		<? endif; ?>
		<li><a href="/order/add_position?id_order=<?=$order->id?>">Добавить позицию</a></li>
		
		<!-- change state order -->
		<? if ($order->state == OrderState::REGISTERED): ?>
			<li><a href="/order/to_preparation?id_order=<?=$order->id?>">В подготовку</a></li>
		<? elseif($order->state == OrderState::PREPARATION): ?>
			<li><a href="/order/to_work?id_order=<?=$order->id?>">Выдать в работу</a></li>
		<? elseif ($order->state == OrderState::WORK): ?>
				<li><a href="/order/to_made?id_order=<?=$order->id?>">Заказ выполнен</a></li>
		<? endif; ?>
			
    </ul>
	
	<!-- menu order content -->
	<? if ($order->state == OrderState::PREPARATION && $order->content): ?>
		<ul id="menu-order-content">
			<li><a href="#" id="content_delete" id_order="<?=$order->id?>">Удалить позиции</a></li>
		</ul>
	<? endif; ?>
	
	<!-- menu order actions -->
		<ul id="menu-order-actions">
			<? if ($order->actions): ?>
				<li id="order-action-edit" id_order="<?=$order->id?>">Редактировать</li>
				<li id="order-action-delete" id_order="<?=$order->id?>">Удалить операцию</li>
			<? endif; ?>
			<li id="order-action-add">
				<a href="/order_action/add_unplan?id_order=<?=$order->id?>">Добавить операцию</a>
			</li>
		</ul>

</div>