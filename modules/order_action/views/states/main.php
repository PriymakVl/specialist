<?php


?>

<!-- css files -->
<link rel="stylesheet" href="/modules/order_action/css/states.css">

<div id="content">
	
	<h3>
		Деталь: <span class="green"><?=$action->product->name.' '.$action->product->symbol?></span> 
		Операция: <span class="green"><?=$action->name?></span>
		<a href="#" onclick="history.back(); return false;" class="back-link">Вернуться назад</a>
	</h3>
		
    <!-- action state list -->
    <? include_once('list.php'); ?>


</div><!-- id content -->

<!-- js files -->


