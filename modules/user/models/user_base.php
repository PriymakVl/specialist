<?php
require_once('./core/model.php');
require_once ('./helpers/date.php');
require_once ('./helpers/message.php');
require_once ('./helpers/helper.php');
require_once ('user_options.php');

require_once ('./modules/order/models/order.php');
require_once ('./modules/statistics/models/statistics.php');
require_once('./params/param_worker.php');
require_once('./modules/order/models/order_action.php');


class UserBase extends Model
{

	public $defaultTypeOrder;
	public $defaultProductAction;
	
	const POSITION_WORKER = 1;
	

}