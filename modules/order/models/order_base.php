<?php
require_once ('./core/model.php');
require_once ('./helpers/date.php');
require_once ('./helpers/message.php');
require_once ('./helpers/helper.php');

require_once ('./params/param_order_action.php');

	/*product*/
require_once ('./modules/product/models/product.php');
require_once ('./modules/product/models/product_action.php');

	/*order*/
require_once ('order_content.php');
require_once ('order_positions.php');
require_once ('order_extract_products.php');

 /*order action*/
require_once ('./modules/order_action/models/order_action.php');

require_once ('./modules/statistics/models/statistics.php');


class OrderBase extends Model
{

    const TYPE_CYLINDER = 1;
    const TYPE_CAR_NUMBER = 2;

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

