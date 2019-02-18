<?php
    require_once ('./modules/order/models/order_state.php');
?>

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
        <!-- categories -->
        <li class="drop">
            <a href="#">Продукция</a>
            <div class="dropdownContain">
                <div class="dropOut">
                    <div class="triangle"></div>
                    <ul>
                        <li><a href="/product/popular">Популярные</a></li>
                        <li><a href="/product?id_prod=10">Продукция</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <!-- terminal -->
        <li><a href="/statistics/workers">Статистика</a></li>
        <!-- logout -->
        <li><a href="/main/logout">Выход</a></li>
    </ul>
</nav>