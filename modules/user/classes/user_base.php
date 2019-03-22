<?php
require_once('./core/model.php');
require_once ('./helpers/date.php');
require_once ('./helpers/message.php');
require_once ('./helpers/helper.php');
require_once ('user_options.php');

require_once ('./modules/order/classes/order.php');
require_once ('./modules/statistics/classes/statistics.php');
require_once('./params/param_worker.php');
require_once('./modules/order_action/classes/order_action.php');


class UserBase extends Model
{

	public $defaultTypeOrder;
	public $defaultProductAction;
	public $defaultStateOrders;//for show on list orders
	public $options;
	
	const POSITION_SUPER_ADMIN = 1;
	const POSITION_ADMIN = 2;
	const POSITION_BOSS = 3;
	const POSITION_DESINGER = 4;
	const POSITION_MANAGER = 5;
	const POSITION_WORKER = 6;
	

}