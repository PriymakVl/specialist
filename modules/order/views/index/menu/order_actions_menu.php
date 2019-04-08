<ul id="order-actions-menu-wrp" <? if (!$order->actions || $this->get->tab != 3) echo 'style="display:none;"'; ?>>
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
