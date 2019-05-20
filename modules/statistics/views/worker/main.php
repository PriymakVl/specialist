<?php

?>

<!-- css files -->
<link rel="stylesheet" href="/modules/statistics/css/filters.css">

<div id="content">
    <!-- filters box -->
    <? include_once('filters.php'); ?>

	<!-- total -->
	<? if ($worker->actionsMade) include_once('total.php'); ?>
	
    <!-- actions -->
	<? include_once('actions.php'); ?>


    <!-- worker menu -->
    <? include_once('menu.php'); ?>


</div><!-- id content -->

<!-- js files -->
<script src="/web/js/datepicker.js"></script>
<script src="/web/js/get_value_from_request.js"></script>
<script src="/modules/statistics/js/statistics_filter_actions.js"></script>

