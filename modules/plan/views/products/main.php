<?php
	if ($this->get->type_order == Order::TYPE_CYLINDER) $type_string = 'Пневмо';
	else $type_string = 'Пресса и накатки';
?>
<!-- css files -->
<link rel="stylesheet" href="/modules/plan/css/filters.css">
<link rel="stylesheet" href="/modules/plan/css/table_date_header.css">

<div id="content">
    <!-- filter level -->
    <? include_once('filter_level.php'); ?>

    <!-- order form search -->
    <? //include_once('search.php'); ?>

    <!-- message -->
    <? include_once('./views/total/message.php'); ?>

    <!-- products plan -->
    <? include_once('products.php'); ?>

	<!-- orders plan menu -->
    <? include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<script src="/web/js/get_value_from_request.js"></script>
<script src="/modules/plan/js/level_filters.js"></script>
<script src="/modules/plan/js/edit_rating.js"></script>
<script src="/modules/plan/js/edit_state_product.js"></script>

