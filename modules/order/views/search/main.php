<?php

require_once ('./modules/order/models/order.php');
require_once ('./modules/order/models/order_state.php');

?>

<!-- css files -->
<link rel="stylesheet" href="/modules/order/css/list.css">

<div id="content">
	
    <!-- message -->
    <? include_once('./views/total/message.php'); ?>
	
	<h3>Результаты поиска</h3>

    <!-- order list -->
    <? include_once('list.php'); ?>


</div><!-- id content -->

<!-- js files -->


