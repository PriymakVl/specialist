<?php

class ProductAction extends Model {

	public $name;
	public $price;
	public $options;
	
	use ProductActionModel;
	
	public function __construct($id_action = false)
    {
        $this->tableName = 'product_actions';
        parent::__construct($id_action);
		$this->message->section = 'product_action';
    }
	
	public function getForProduct($symbol)
	{
		$items = $this->getAllBySymbolProduct($symbol);
		if ($items) return ObjectHelper::createArray($items, 'ProductAction', ['setData', 'setProperties']);
	}
	
	public function setProperties()
	{
		$this->options = new DataAction($this->id_data);
		$this->name = $this->options->name;
		$this->price = $this->options->price;
		return $this;
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
		$this->editSymbolProduct();
		return $this;
	}
	
	
	
	
	

	
}