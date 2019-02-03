<?php

require_once ('./modules/order/models/order.php');

?>

<!-- css files -->
<link rel="stylesheet" href="/modules/category/css/menu.css">
<link rel="stylesheet" href="/modules/category/css/index.css">

<div id="content">

    <!-- message -->
    <? //include_once('./views/total/message.php'); ?>

    <div id="category-index-wrp">

        <!-- info box -->
        <? include_once('info.php'); ?>

        <!-- list products -->
        <? include_once('products.php'); ?>

        <!-- statistics -->
        <? //include_once('statistics.php'); ?>

    </div>

    <!-- order menu -->
    <? include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<script src="/modules/category/js/add_to_specif.js"></script>

