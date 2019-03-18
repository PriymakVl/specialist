<div id="menu-order-wrp">
	<!-- menu order -->
    <ul id="menu-order" <? if ($order->content || $order->actions || $order->actionsUnplan) echo 'style="display:none;"'?>>
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
		<? if (!$order->actionsUnplan): ?>
			<li>
				<a href="/order_action/add_unplan?id_order=<?=$order->id?>">Доб. дополн. операц</a>
			</li>
		<? endif; ?>
    </ul>
	
	<!-- menu order content -->
	<? if ($order->state == OrderState::PREPARATION && $order->content): ?>
		<ul id="menu-order-content">
			<li><a href="#" id="content_delete" id_order="<?=$order->id?>">Удалить позиции</a></li>
		</ul>
	<? endif; ?>
	
	<!-- menu order actions -->
	<? if ($order->actions): ?>
		<ul id="menu-order-actions">
			<li id="order-action-edit-state">Редакт. состояние</li>
			<li id="order-action-delete" id_order="<?=$order->id?>">Удалить операцию</li>
		</ul>
	<? endif; ?>
	
	<!-- actions unplan -->
	<? if ($order->actionsUnplan): ?>
		<ul id="menu-order-actions-unplan" style="display:none;">
			<li>
				<a href="/order_action/add_unplan?id_order=<?=$order->id?>">Доб. доп. операцию</a>
			</li>
			<li id="order-action-unplan-edit" id_order="<?=$order->id?>">Ред. внепл. операц</li> 
			<li id="order-action-unplan-delete" id_order="<?=$order->id?>">Удал. дополн. операц</li>
		</ul>
	<? endif; ?>
	
</div>