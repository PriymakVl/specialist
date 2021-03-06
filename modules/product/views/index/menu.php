<div class="menu-sidebar-wrp">
    <ul>
		<li>
            <a href="/product/add?id_parent=<?=$product->id?>">Добавить</a>
        </li>
        <li>
            <a href="/product/edit?id_prod=<?=$product->id?>">Редактировать</a>
        </li>
        <li>
            <a href="#" id_prod="<?=$product->id?>" id="product-delete">Удалить</a>
        </li>
		<br><hr>
		
		<li>
			<a href="/product/activate?id_prod=<?=$product->id?>">Сделать активным</a>
		</li>
		<li>
			<a href="drawing/add?symbol=<?=$product->symbol?>&id_prod=<?=$product->id?>">Добавить чертеж</a>
		</li>
		<br><hr>
		
		
		<li>
            <a href="#" id_prod="<?=$product->id?>" id="add-to-order-all">Добавить в заказ (все)</a>
        </li>
        <li>
            <a href="#" id_prod="<?=$product->id?>" id="add-to-order-unit">Добавить в заказ (узел)</a>
        </li>
        <br>
		<li>
            <a href="/product/copy?id_prod=<?=$product->id?>">Скопир. продукт</a>
        </li>
        <li>
            <a href="/product/move?id_prod=<?=$product->id?>">Переместить продукт</a>
        </li>
        <br><hr>
        
		<!-- form add product actions -->
		<? if ($product->type == Product::TYPE_DETAIL || $product->type == Product::TYPE_UNIT || $product->type == Product::TYPE_PRODUCT): ?>
			<li>
				<a href="/product_action/add?id_prod=<?=$product->id?>&symbol=<?=$product->symbol?>">Добавить операцию</a>
			</li>
			<li>
				<a href="/product_action/copy?symbol=<?=$product->symbol?>">Скопир. операции</a>
			</li>
		<? endif; ?>
    </ul>
</div>