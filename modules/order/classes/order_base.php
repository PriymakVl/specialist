<?php
require_once ('./core/model.php');
require_once ('./helpers/date.php');
require_once ('./helpers/message.php');
require_once ('./helpers/helper.php');

require_once ('./params/param_order_action.php');

	/*product*/
require_once ('./modules/product/classes/product.php');
require_once ('./modules/product/classes/product_action.php');

	/*order position*/
require_once ('./modules/order_position/classes/order_position.php');

    /* order content */
require_once ('./modules/order_content/classes/order_content.php');
require_once ('./modules/order_content/traits/order_extract_products.php');
require_once 'order_param.php';

 /*order action*/
require_once ('./modules/order_action/classes/order_action.php');

require_once ('./modules/statistics/classes/statistics.php');


class OrderBase extends Model
{

    const TYPE_CYLINDER = 1;
    const TYPE_CAR_NUMBER = 2; //пресса и накатки
	
	const RATING_REGULAR = 1;
	const RATING_IMPORTANT = 2;
	const RATING_PRIORITY = 3;

    //date
    public $dateExecution; //дата выполнения заказа
    public $dateRegistration; //дата регистрации заказа
    public $datePreparation; //дата регистрации дата выдачи в подготовку
    public $dateWork; //дата выдачи в работу
    public $dateMade; //дата выполнения заказа
    public $dateShipment; //дата отгрузки заказа
	
	public $timeManufacturingForWorker = 0;
	
	public $bgTerminalBox;
	
	
}

