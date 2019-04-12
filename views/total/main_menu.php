<nav id="main-menu">
    <ul>
        <!-- orders -->
        <li class="drop">
            <a href="#">Заказы</a>
            <div class="dropdownContain">
                <div class="dropOut">
                    <div class="triangle"></div>
                    <ul>
                        <li><a href="/order/list">Перечень заказов</a></li>
                        <li><a href="/order/add">Добавить заказ</a></li>
                    </ul>
                </div>
            </div>
        </li>
		
        <!-- products -->
		<li class="drop">
            <a href="#">Продукция</a>
            <div class="dropdownContain">
                <div class="dropOut">
                    <div class="triangle"></div>
                    <ul>
                        <li><a href="/product?id_prod=10">Пневмо</a></li>
                        <li><a href="/product?id_prod=11">Пресса и накатки</a></li>
                    </ul>
                </div>
            </div>
        </li>
		
		<!-- planning -->
		<li class="drop">
            <a href="#">Планирование</a>
            <div class="dropdownContain">
                <div class="dropOut">
                    <div class="triangle"></div>
                    <ul>
                        <li><a href="/plan/orders?type=<?=Order::TYPE_CYLINDER?>">Пневмо</a></li>
                        <li><a href="/plan/orders?type=<?=Order::TYPE_CAR_NUMBER?>">Пресса и накатки</a></li>
                    </ul>
                </div>
            </div>
        </li>
		
        <!-- statistics -->
        <li><a href="/statistics/workers">Статистика</a></li>
        <!-- logout -->
        <li><a href="/main/logout">Выход</a></li>
    </ul>
</nav>