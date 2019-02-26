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
require_once ('order_action.php');
require_once ('order_extract_products.php');

require_once ('./modules/statistics/models/statistics.php');


class OrderBase extends Model
{

    const TYPE_CYLINDER = 1;
    const TYPE_CAR_NUMBER = 2;
	
	//const KIND_WORK_CUTTING = 1; //порезка заготовок
	//const KIND_WORK_MAKE = 2; //изготовление детали
	//const KIND_WORK_ASSEMBLY = 3; //сборка

    /**состояние для детали, состояние для заказа в классе OrderState **/
    //todo создать класс ProductState
    const STATE_WORK_PLANED = 1; //работа запланирована
    const STATE_WORK_PROGRESS = 2; //работа выполняется
    const STATE_WORK_STOPPED = 3; //работа остановлена по какой то причине
    const STATE_WORK_END = 4; //работа закончена
    const STATE_WORK_WAITING = 5; //ожидает окончание выполнения предыдущей операции

    //date
    public $dateExecution; //дата выполнения заказа
    public $dateRegistration; //дата регистрации заказа
    public $datePreparation; //дата регистрации дата выдачи в подготовку
    public $dateWork; //дата выдачи в работу
    public $dateMade; //дата выполнения заказа
    public $dateShipment; //дата отгрузки заказа
	
	public $timeManufacturingForWorker = 0;

}

