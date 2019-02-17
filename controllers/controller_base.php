<?php
require_once ('./core/controller.php');

        /* params */
require_once ('./params/param.php');
require_once ('./params/param_terminal.php');
require_once ('./params/param_order.php');
require_once ('./params/param_product.php');

        /* user */
require_once ('./modules/user/models/user.php');
require_once('./modules/user/models/worker.php');

        /* order */
require_once('./modules/order/models/order.php');
require_once('./modules/order/models/order_content.php');
require_once('./modules/order/models/order_static.php');
require_once('./modules/order/models/order_state.php');

require_once('./modules/product/models/product.php');

require_once('./modules/statistics/models/statistics.php');



class Controller_Base extends Controller {
	

	

}