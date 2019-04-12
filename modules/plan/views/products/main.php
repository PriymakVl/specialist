<?php
	if ($this->get->type == Order::TYPE_CYLINDER) $type_string = 'Пневмо';
	else $type_string = 'Пресса и накатки';
?>
<!-- css files -->
<link rel="stylesheet" href="/modules/plan/css/filters.css">

<div id="content">
	<h2>Планирование - <span class="green"><?=$type_string?></span></h2>
    <!-- filters plan -->
    <? include_once('filters.php'); ?>

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

