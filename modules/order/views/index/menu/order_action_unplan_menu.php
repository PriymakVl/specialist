<ul id="menu-order-actions-unplan" style="display:none;">
	<? if ($order->actionsUnplan): ?>
		<li>
			<a href="/order_action/add_unplan?id_order=<?=$order->id?>">Доб. доп. операцию</a>
		</li>
		<li id="order-action-unplan-edit" id_order="<?=$order->id?>">Ред. внепл. операц</li> 
		<li id="order-action-unplan-delete" id_order="<?=$order->id?>">Удал. дополн. операц</li>
	<? endif; ?>
	<? if (!$order->actionsUnplan): ?>
		<li>
			<a href="/order_action/add_unplan?id_order=<?=$order->id?>">Доб. дополн. операц</a>
		</li>
	<? endif; ?>
</ul>