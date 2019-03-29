<?php

class OrderBase extends Model {
	
	const TYPE_CYLINDER = 1;
    const TYPE_CAR_NUMBER = 2; //пресса и накатки
	
	const RATING_REGULAR = 1;
	const RATING_IMPORTANT = 2;
	const RATING_PRIORITY = 3;
	
    public $content;
	public $positionsTable;
	public $positions;
	public $stateString;
	public $actions;
	public $actionsUnplan;
	public $products;
	public $ratingString;

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

