<div class="menu-sidebar-wrp">
    <ul>
        <li>
            <a href="/order_product/edit?id_prod=<?=$product->id?>">Редактир-ть продукт</a>
        </li>
        <li>
            <a href="#" id_prod="<?=$product->id?>" id="product-delete">Удалить продукт</a>
        </li>
		<br><hr>
		<li>
			<a href="/order_action/add_for_product?id_prod=<?=$product->id?>&id_order=<?=$product->id_order?>">Добавить операцию</a>
		</li>
		<? if ($product->actions): ?>
			<li>
				<a href="#" id="order-product-action-edit">Редакт-ть операцию</a>
			</li>
			<li>
				<a href="#" id="order-product-action-delete">Удалить операцию</a>
			</li>
			<br><hr>
			<li>
				<a href="#" id="order-action-edit-state" id_prod="<?=$product->id?>">Редак-ть состояние</a>
			</li>
		<? endif; ?>
    </ul>
</div>