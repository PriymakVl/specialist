<?php
	if ($this->get->type_order == Order::TYPE_CYLINDER) $type_string = 'Пневмо';
	else $type_string = 'Пресса и накатки';
?>
<!-- css files -->
<link rel="stylesheet" href="/modules/plan/css/filters.css">
<link rel="stylesheet" href="/modules/plan/css/info.css">
<link rel="stylesheet" href="/modules/plan/css/table_date_header.css">

<div id="content">
    <!-- filter level plan -->
	<? if ($worker): ?>
		<? include 'info.php'; ?>
	<? else: ?>
		<? include('filter_level.php'); ?>
	<? endif; ?>

    <!-- order form search -->
    <? //include_once('search.php'); ?>

    <!-- message -->
    <? include('./views/total/message.php'); ?>

    <!-- workers or actions worker plan -->
	<? if ($worker): ?>
		<? include('actions.php'); ?>
	<? else: ?>
		<? include('workers.php'); ?>
	<? endif; ?>

	<!-- orders plan menu -->
    <? if ($worker) include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<script src="/web/js/get_value_from_request.js"></script>
<script src="/modules/plan/js/level_filters.js"></script>
<script src="/modules/plan/js/edit_rating.js"></script>
<script src="/modules/plan/js/edit_state_action.js"></script>


