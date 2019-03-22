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

            <!-- content -->
			<? if ($order->content) include_once('content.php'); ?>

            <!-- actions -->
            <? if ($order->actions) include_once('actions.php'); ?>
			
			<!-- actions unplan -->
			<? if ($order->actionsUnplan) include_once('actions_unplan.php'); ?>
        </ul>
    </div>

    <!-- order menu -->
    <? include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<script src="/modules/order/js/change_menu.js"></script>
<script src="/modules/order/js/change_quantity_content.js"></script>
<script src="/modules/order/js/order_delete.js"></script>
<script src="/modules/order/js/content_delete.js"></script>
<script src="/modules/order/js/order_actions_managment.js"></script>
<script src="/modules/order/js/delete_action_unplan.js"></script>
<script src="/modules/order/js/edit_action_unplan.js"></script>
<script src="/modules/order_position/js/order_position_delete.js"></script>
