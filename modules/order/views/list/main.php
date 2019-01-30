<?php

require_once ('./modules/order/models/order.php');
require_once ('./modules/order/models/order_state.php');

?>

<!-- css files -->
<link rel="stylesheet" href="/modules/order/css/list.css">
<link rel="stylesheet" href="/modules/order/css/form.css">

<div id="content">
    <!-- filters of orders -->
    <? include_once('filters.php'); ?>

    <!-- order form search -->
    <? //include_once('form/search.php'); ?>

    <!-- message -->
    <? //include_once('./views/total/message.php'); ?>

    <!-- order list -->
    <? include_once('data.php'); ?>

    <!-- order list menu -->
    <? include_once('menu.php'); ?>

    <!-- order form add -->
    <? include_once('./modules/order/views/form/add.php'); ?>

</div><!-- id content -->

<!-- js files -->
<script src="/modules/order/js/order_activate.js"></script>
<script src="/modules/order/js/order_to_work.js"></script>
<script src="/modules/order/js/show_order_add_form.js"></script>
<script src="/modules/order/js/order_filters.js"></script>
<script src="/web/js/datepicker.js"></script>

