<!-- css files -->
<link rel="stylesheet" href="/modules/order_product/css/index.css">

<div id="content">

    <div id="product-index-wrp">
        <ul class="tabs">
		
			<!-- message -->
			<? include './views/total/message.php'; ?>

            <!-- order  info -->
            <? include_once('info.php'); ?>

            <!-- specifications -->
			<? if ($product->specification) include 'specification/groups.php'; ?>

            <!-- actions -->
            <? //if ($product->actions) include_once('actions.php'); ?>
			
			<!-- drawings -->
			<? //if ($product->drawings) include_once('drawings.php'); ?>
        </ul>
    </div>

    <!-- order menu -->
    <? include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files 
<script src="/modules/product/js/delete_action.js"></script>
<script src="/modules/product/js/delete_product.js"></script>
<script src="/modules/drawing/js/delete_drawing.js"></script>
<script src="/modules/order_product/js/add_to_order.js"></script> -->

