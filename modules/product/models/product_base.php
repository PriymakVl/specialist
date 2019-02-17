<?php
require_once('./core/model.php');
require_once ('./helpers/date.php');
require_once ('./helpers/message.php');
require_once ('./helpers/helper.php');
require_once('product.php');
require_once ('product_time.php');

class ProductBase extends Model
{
	// specification
	public $specification;
	
	public $timeManufacturingOrder; //время на изготовление всего количество деталей одной позиции в заказе
	public $timeProduction;
	public $timePreparation;
	
	//order
    public $order;
    public $orderQtyAll; //количество деталей в заказе
	public $orderQtyDone; //количество деталей сделанных по заказу на данный момент
	public $typeOrder;
	
	//work
	public $startWork;
	public $endWork;
	public $kindWork; //порезка, обработка, сборка
	public $stateWork; //выдана, обрабатывается, готова и др.
	public $stateWorkConvert;
	public $idWorker;
	
	//terminal
	public $bgTerminalProductBox;

	const TYPE_CATEGORY = 1;
    const TYPE_PRODUCT = 2;
    const TYPE_UNIT = 3;
    const TYPE_DETAIL = 4;
	
	const BG_TERMINAL_BOX_PLAN = 'yellow';
	const BG_TERMINAL_BOX_PROGRESS = 'green';
	const BG_TERMINAL_BOX_STOPPED = 'red';


}