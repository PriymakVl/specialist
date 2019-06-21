<div id="main-menu-order-wrp">
	
	<!-- order and order position menu-order -->
	<? include 'order_menu.php'; ?>
	
	<!-- order products menu -->
	<? if ($user->position < User::POSITION_MANAGER) include 'order_products_menu.php'; ?>
	
	<!-- order actions menu -->
	<? if ($user->position < User::POSITION_MANAGER) include 'order_actions_menu.php'; ?>
</div>