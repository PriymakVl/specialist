<?php
require_once ('./core/controller.php');

        /* params */
require_once ('./params/param.php');
require_once ('./params/param_order.php');
require_once ('./params/param_product_action.php');

	/*terminal*/
require_once ('./params/param_terminal.php');


        /* user */
require_once ('./modules/user/models/user.php');
require_once('./modules/user/models/worker.php');

        /* order */
require_once('./modules/order/models/order.php');
require_once('./modules/order/models/order_content.php');
require_once('./modules/order/models/order_static.php');
require_once('./modules/order/models/order_state.php');
require_once('./modules/order/models/order_action.php');

	/*product*/
require_once('./modules/product/models/product.php');
require_once('./modules/product/models/product_action.php');

require_once('./modules/statistics/models/statistics.php');
require_once ('./models/action.php');



class Controller_Base extends Controller {
	

	

}