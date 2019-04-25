<?php

class ProductBase extends Model
{
	public $timeManufacturingUnit = 0; //трудоемкость узла
	public $timeManufacturingItem = 0; //общее время на изготовление элемента(детали или сборки узла и т.д.)
	public $timeManufacturingSpecification = 0; //трудоемкость деталей в спецификации
	
	//order
    //public $order;
    //public $orderQtyAll; //количество деталей в заказе
	//public $orderQtyDone; //количество деталей сделанных по заказу на данный момент
	//public $typeOrder;
	
	//work
	//public $startWork;
	//public $endWork;
	//public $kindWork; //порезка, обработка, сборка
	//public $stateWork; //выдана, обрабатывается, готова и др.
	//public $stateWorkConvert;
	//public $idWorker;
	
	//public $id_item; //для редактирования количества в заказе (контент)

	const TYPE_CATEGORY = 1;
    const TYPE_PRODUCT = 2;
    const TYPE_UNIT = 3;
    const TYPE_DETAIL = 4;
	const TYPE_STANDARD = 5;
	const TYPE_OTHER = 6;
	
	public $parent;
	public $typeViewSpecification;
	public $actions;
	public $statistics;
	public $specificationGroup;//divided on group detail, unit and other
	public $drawings;
	public $specification;
	public $specificationAll;
	public $typeString;


}