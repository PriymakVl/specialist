<?php
require_once ('./core/controller.php');

         /* params */
require_once ('./core/param.php');
require_once ('./params/param_order.php');
require_once ('./params/param_product.php');
require_once ('./params/param_product_action.php');
require_once ('./params/param_statistics.php');
require_once ('./params/param_order_action_unplan.php');
require_once ('./params/param_drawing.php');

	// /*terminal*/
require_once ('./params/param_terminal.php');


        // /* user */
require_once ('./modules/user/classes/user.php');
require_once('./modules/user/classes/worker.php');

        // /* order */
require_once('./modules/order/classes/order.php');
require_once('./modules/order/classes/order_static.php');
require_once('./modules/order/classes/order_state.php');

    // /* order action */
require_once('./modules/order_action/classes/order_action.php');
require_once('./modules/order_action/classes/order_action_unplan.php');

	// /*order content*/
require_once('./modules/order_content/classes/order_content.php');

	// /*product*/
require_once('./modules/product/classes/product.php');
require_once('./modules/product/classes/product_action.php');

require_once('./modules/statistics/classes/statistics.php');
require_once ('./models/data_action.php');
require_once('./modules/drawing/classes/drawing.php');



class Controller_Base extends Controller {
	

	

}