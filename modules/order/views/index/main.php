<?php

require_once ('./modules/order/models/order.php');

?>

<!-- css files -->
<link rel="stylesheet" href="/modules/order/css/menu.css">
<link rel="stylesheet" href="/modules/order/css/index.css">

<div id="content">

    <!-- message -->
    <? //include_once('./views/total/message.php'); ?>

    <div id="order-index-wrp">
        <ul class="tabs">

            <!-- order  info -->
            <? include_once('info.php'); ?>

            <!-- content -->
            <? include_once('content.php'); ?>

            <!-- statistics -->
            <? include_once('statistics.php'); ?>

        </ul>
    </div>

    <!-- order menu -->
    <? include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<!--<script src="/web/js/order/delete.js"></script>-->

