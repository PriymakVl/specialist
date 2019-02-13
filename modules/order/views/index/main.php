<?php

require_once ('./modules/order/models/order.php');

?>

<!-- css files -->
<link rel="stylesheet" href="/modules/order/css/menu.css">
<link rel="stylesheet" href="/modules/order/css/index.css">
<link rel="stylesheet" href="/modules/order/css/form.css">

<div id="content">

    <!-- active box info -->
	<? if ($id_active == $order->id): ?>
		<div class="message success-message">Активный заказ</div>
    <? endif; ?>

    <div id="order-index-wrp">
        <ul class="tabs">

            <!-- order  info -->
            <? include_once('info.php'); ?>

            <!-- content -->
            <? include_once('content.php'); ?>

            <!-- statistics -->
            <? include_once('statistics.php'); ?>
			
        </ul>
		
		<!-- form -->
		<? include_once('form.php'); ?>
    </div>

    <!-- order menu -->
    <? include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<script src="/modules/order/js/show_order_form.js"></script>
<script src="/modules/order/js/change_menu.js"></script>
<script src="/modules/order/js/change_quantity_content.js"></script>

