<?php


?>

<!-- css files -->
<!--<link rel="stylesheet" href="/modules/order/css/list.css">-->

<div id="content">
	
	<h3>
		Деталь: <span class="green"><?=$action->product->name.' '.$action->product->symbol?></span> 
		Операция: <span class="green"><?=$action->action->name?></span>
		<a href="/order?id_order=<?=$action->id_order?>">Вернуться назад</a>
	</h3>
		
    <!-- order list -->
    <? include_once('list.php'); ?>


</div><!-- id content -->

<!-- js files -->


