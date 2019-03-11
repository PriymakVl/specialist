<?php

?>

<!-- css files -->
<link rel="stylesheet" href="/modules/statistics/css/filters.css">

<div id="content">
    <!-- info box -->
    <? include_once('filters.php'); ?>

    <!-- actions made -->
	<? if (empty($params['period_start'])): ?>
		<? include_once('actions_plan.php'); ?>
	<? else: ?>
		<? include_once('actions_made.php'); ?>
	<? endif; ?>

    <!-- worker list menu -->
    <? //include_once('menu.php'); ?>


</div><!-- id content -->

<!-- js files -->
<script src="/modules/statistics/js/filters_worker.js"></script>
<script src="/web/js/datepicker.js"></script>

