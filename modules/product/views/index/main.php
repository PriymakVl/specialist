<!-- css files -->
<link rel="stylesheet" href="/modules/product/css/index.css">

<div id="content">

    <!-- active box info -->
	<? if ($this->session->id_prod_active == $product->id): ?>
		<div class="message message-success">Активный</div>
    <? endif; ?>

    <div id="product-index-wrp">
        <ul class="tabs">
		
			<!-- message -->
			<? include './views/total/message.php'; ?>
			
			<!-- search product -->
			<!-- файл подключен в specification/category -->

            <!-- order  info -->
            <? include_once('info.php'); ?>

            <!-- specifications -->
			<? 
				if ($product->specification) {
					if ($product->id == ID_CATEGORY_CYLINDER || $product->id == ID_CATEGORY_PRESS || $product->id == ID_CATEGORY_PRODUCTS) include_once('specification/category.php'); 
					else if ($product->specificationGroup)  include_once('specification/groups.php');  
				}
			?>

            <!-- actions -->
            <? if ($product->actions) include_once('actions.php'); ?>
			
			<!-- statistics -->
			<? if ($product->orderProducts) include_once('statistics.php'); ?>
			
			<!-- drawings -->
			<? if ($product->drawings) include_once('drawings.php'); ?>
        </ul>
    </div>

    <!-- order menu -->
    <? include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<script src="/modules/product/js/delete_action.js"></script>
<script src="/modules/product/js/delete_product.js"></script>
<script src="/modules/drawing/js/delete_drawing.js"></script>
<script src="/modules/order_product/js/add_to_order.js"></script>

