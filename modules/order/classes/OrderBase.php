<?php

class OrderBase extends Model {
	
	const TYPE_CYLINDER = 1;
    const TYPE_CAR_NUMBER = 2; //пресса и накатки
	
	const RATING_REGULAR = 0;
	const RATING_IMPORTANT = 50;
	const RATING_PRIORITY = 100;
	
    // public $content;
	public $positionsTable;
	public $positions;
	
	public $stateString;
	public $stateBg;
	
	public $actions;
	public $actionsUnplan;
	
	public $productsMain;
	public $productsAll;
	public $productsNotReady;
	public $productsTable;
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
	
	public function __construct($id_order = false)
    {
        $this->tableName = 'orders';
        parent::__construct($id_order);
		$this->message->section = 'order';
    }
	
	
}

