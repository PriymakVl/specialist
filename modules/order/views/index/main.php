<!-- css files -->
<link rel="stylesheet" href="/modules/order/css/menu.css">
<link rel="stylesheet" href="/modules/order/css/index.css">

<div id="content">

    <!-- active box info -->
	<? if ($this->session->id_order_active == $order->id): ?>
		<div class="message message-success">Активный заказ</div>
    <? endif; ?>

    <!-- message -->
    <? include_once('./views/total/message.php'); ?>

    <div id="order-index-wrp">
        <ul class="tabs">

            <!-- order  info -->
            <? include_once('info.php'); ?>

            <!-- products -->
			<? if ($order->products) include_once('products.php'); ?>

            <!-- actions -->
            <? if ($order->actions) include_once('actions.php'); ?>
			
			<!-- actions unplan -->
			<? if ($order->actionsUnplan) include_once('actions_unplan.php'); ?>
        </ul>
    </div>

    <!-- order menu -->
    <? include_once('menu/main_menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<script src="/modules/order/js/change_menu.js"></script>
<script src="/modules/order_product/js/edit_product.js"></script>
<script src="/modules/order/js/order_delete.js"></script>
<script src="/modules/order_product/js/delete_product.js"></script>
<script src="/modules/order_action/js/order_action_delete.js"></script>
<script src="/modules/order_action/js/order_action_edit_state.js"></script>
<script src="/modules/order/js/delete_action_unplan.js"></script>
<script src="/modules/order/js/edit_action_unplan.js"></script>
<script src="/modules/order_position/js/order_position_delete.js"></script>
