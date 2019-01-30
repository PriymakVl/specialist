<?php
    require_once ('./modules/order/models/order_state.php');
?>

<nav id="main-menu">
    <ul>
        <!-- orders -->
		<li><a href="/order/list">Заказы</a></li>
		
        <!--<li class="drop">
            <a href="#">Заказы</a>
            <div class="dropdownContain">
                <div class="dropOut">
                    <div class="triangle"></div>
                    <ul>
                        <li><a href="/order/list?state=<?=OrderState::REGISTERED?>">Зарегистрированны</a></li>
                        <li><a href="/order/list?state=<?=OrderState::PREPARATION?>">В подготовке</a></li>
                        <li><a href="/order/list?state=<?=OrderState::WORK?>">В работе</a></li>
                        <li><a href="/order/list?state=<?=OrderState::MADE?>">Готовы</a></li>
                        <li><a href="/order/list?state=<?=OrderState::SENT?>">Отгружены</a></li>
                        <li><a href="/order/list?state=<?=OrderState::ALL?>">Все</a></li>
                    </ul>
                </div>
            </div>
        </li> -->
        <!-- categories -->
        <li class="drop">
            <a href="#">Категории</a>
            <div class="dropdownContain">
                <div class="dropOut">
                    <div class="triangle"></div>
                    <ul>
                        <li><a href="/category/popular">Популярные</a></li>
                        <li><a href="#">Пневмоцилиндры</a></li>
                        <li><a href="#">Другое</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <!-- terminal -->
       <li class="drop">
            <a href="#">Терминал</a>
            <div class="dropdownContain">
                <div class="dropOut">
                    <div class="triangle"></div>
                    <ul>
                        <li><a href="/terminal/login">Авторизация</a></li>
                        <li><a href="/terminal/orders">Заказы</a></li>
						<li><a href="/terminal/products">Изделия</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <!--<li><a href="/category/popular">Разное</a></li> -->
    </ul>
</nav>