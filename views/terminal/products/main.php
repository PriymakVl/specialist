<!-- css files -->
<link rel="stylesheet" href="/web/css/terminal/style.css">
<link rel="stylesheet" href="/web/css/terminal/actions_box.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<div id="content">
	<a href="/terminal/login" class="exit-link">Выход</a>
	<a href="/terminal/orders" class="orders-link">Заказы</a>
	
	<div id="terminal-wrp">
		<div class="terminal-info"><?=$worker->title?></div>
		<!-- <div id="clock">10:49</div> -->
		<h3><span>Детали по заказу</span> <?=$order->description?></h3>
		
		<!-- products box -->
		<? include_once('products_box.php'); ?>

		<!-- actions box -->
		<? include_once('actions_box.php'); ?>
	</div>
</div><!-- id content -->

<!-- js files -->
<script src="/web/js/terminal/product_actions.js"></script>

