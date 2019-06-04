<!-- css files -->
<link rel="stylesheet" href="/modules/statistics/css/product.css">

<div id="content">
    <h2><? printf('Заказ: <span class="green">%s</span> Изделие: <span class="green">%s %s</span>', $product->order->symbol, $product->symbol, $product->name)?>
    	<a class="link-back" href="/product?id_prod=<?=$this->get->id_prod?>">Вернуться назад</a>
    </h2>
	
    <!-- actions -->
	<? include 'actions.php'; ?>


</div><!-- id content -->

<!-- js files -->


