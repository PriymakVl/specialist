<ul id="order-products-menu-wrp" <? if ($this->get->tab == 1 || $this->get->tab == 3) echo 'style="display:none;"'; ?>>
	<li>
		<a href="/order_product/add_form?id_order=<?=$order->id?>">Добавить продукт</a>
	</li>
	<li>
		<a href="#" id="add-order-product" id_order="<?=$order->id?>">Редактир-ть продукт</a>
	</li>
	<li>
		<a href="#" id_order="<?=$order->id?>" id="delete-order-product">Удалить продукт</a>
	</li>
</ul>

