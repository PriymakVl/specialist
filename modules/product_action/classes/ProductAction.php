<?php

class ProductAction extends Model {

	use ProductActionModel, ProductActionParam, ProductActionList, ProductActionTime;

	public $timeAverage; //averate time order profuct
	public $timeAverageDivision;
	
	public function __construct($id_action = false)
    {
        $this->tableName = 'product_actions';
        parent::__construct($id_action);
		$this->message->section = 'product_action';
    }
	
	public function getForProduct($symbol)
	{
		$items = $this->getAllBySymbolProductModel($symbol);
		if ($items) return ObjectHelper::createArray($items, 'ProductAction', ['setData', 'setTimeAverage']);
	}
	
	public function addData()
	{
		$this->addDataModel();
		return $this;
	}
	
	public function editData()
	{
		$this->editDataModel();
		return $this;
	}
	
	public function editSymbol()
	{
		$this->editSymbolProductModel();
		return $this;
	}
	
	
	
	
	

	
}