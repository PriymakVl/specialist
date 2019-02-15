<?php
require_once('./core/model.php');
require_once ('./helpers/date.php');
require_once ('./helpers/message.php');
require_once ('./helpers/helper.php');
require_once ('user_options.php');
require_once ('./modules/order/models/order.php');
require_once ('./modules/statistics/models/statistics.php');


class UserBase extends Model
{

	public $defaultTypeOrder;
	public $defaultKindWork;
	
	const POSITION_WORKER = 1;
	

}