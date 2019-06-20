<?php
	if ($this->get->type_order == Order::TYPE_CYLINDER) $type_string = 'Пневмо';
	else $type_string = 'Пресса и накатки';
?>
<!-- css files -->
<link rel="stylesheet" href="/modules/plan/css/orders.css">
<link rel="stylesheet" href="/modules/plan/css/filters.css">
<link rel="stylesheet" href="/modules/plan/css/table.css">

<div id="content">
    <!-- filter level -->
    <? include_once('filter_level.php'); ?>

    <!-- order form search -->
    <? //include_once('search.php'); ?>

    <!-- message -->
    <? include_once('./views/total/message.php'); ?>

    <!-- order list -->
    <? include_once('orders.php'); ?>

	<!-- orders plan menu -->
    <? include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<script src="/web/js/get_value_from_request.js"></script>
<script src="/modules/plan/js/level_filters.js"></script>
<script src="/modules/plan/js/edit_state_order.js"></script>
<script src="/modules/plan/js/edit_rating.js"></script>
<script src="/modules/plan/js/edit_qty_product.js"></script>

