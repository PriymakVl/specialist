<?php
require_once('./core/model.php');
require_once ('./helpers/date.php');
require_once ('./helpers/message.php');
require_once ('./helpers/helper.php');
require_once('./modules/specification/models/specification.php');
require_once('product.php');

class ProductBase extends Model
{
	// specification
	public $specifications;
	public $specifQty; //количество деталей в спецификации
	public $idSpecifActive; //есть если является узлом
	
	//order
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
	

}