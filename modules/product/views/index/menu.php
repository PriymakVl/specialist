<div class="menu-sidebar-wrp">
    <ul>
		<li>
            <a href="/product/add?id_parent=<?=$product->id?>">Добавить</a>
        </li>
        <li>
            <a href="/product/edit?id_prod=<?=$product->id?>">Редактировать</a>
        </li>
        <li>
            <a href="/product/delete?id_prod=<?=$product->id?>">Удалить</a>
        </li>
        <li>
            <a href="/product/activate?id_prod=<?=$product->id?>">Сделать активным</a>
        </li>
		<li>
            <a href="/order/add_content?id_prod=<?=$product->id?>">Добавить в заказ</a>
        </li>
		<li>
            <a href="/product/copy?id_prod=<?=$product->id?>">Скопировать</a>
        </li>
    </ul>
</div>