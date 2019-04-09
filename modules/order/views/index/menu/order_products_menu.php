<?
	$hidden_order_products_menu = true;
	if ($order->products) $hidden_order_products_menu = false;
	if ($this->get->tab && $this->get->tab != 2) $hidden_order_products_menu = false;

	// debug($hidden_order_products_menu);
?>

<ul id="order-products-menu-wrp" <? if ($hidden_order_products_menu) echo 'style="display:none;"'; ?>>
	<li>
		<a href="/order_product/add_form?id_order=<?=$order->id?>">Добавить продукт</a>
	</li>
</ul>

