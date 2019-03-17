<?php
require_once('product_static.php');

class Product extends ProductStatic {
	
	public $parent;
	public $typeViewSpecification;
	public $actions;
	public $statistics;
	public $specificationGroup;//divided on group detail, unit and other
	public $drawings;

    public function __construct($id_prod)
    {
        $this->tableName = 'products';
        parent::__construct($id_prod);
		$this->message->section = 'product';
    }
	
	public function getSpecification()
	{
		$this->specification = self::getSpecificationStatic($this->id_parent);
		return $this;
	}
	
	public function getActions()
	{
		$this->actions = ProductAction::getAllBySymbol($this->symbol);
		return $this;
	}
	
	public function getParent()
	{
		if ($this->id_parent) $this->parent = new Product($this->id_parent);
		return $this;
	}
	
	public function countTimeManufacturing()
	{
		$this->countTimeActions();
		$this->countTimeSpecification();
		$this->timeManufacturing = $this->timeActions + $this->timeSpecification;
		return $this;
	}
	
	public function countTimeActions()
	{
		if ($this->actions) $this->timeActions = ProductTime::countTimeProductActions($this);
		return $this;
	}
	
	private function countTimeSpecification()
	{
		if ($this->specification) $this->timeSpecification = ProductTime::countTimeProductSpecification($this);
		return $this;
	}
	
	public function getStatistics()
	{
		$items = OrderAction::getAllOrdersByIdProduct($this->id);
		if (empty($items)) return $this;
		for ($i = 0; $i < count($items); $i++) {
				$this->statistics[$i]['order'] = new Order($items[$i]->id_order);
				$this->statistics[$i]['time'] = Statistics::countTimeFactMadeProductInOrder($items[$i]->id_order, $this->id);
		}
		return $this;
	}
	
	public function getSpecificationGroup()
	{
		if (empty($this->specification)) return $this;
		$this->specificationGroup = self::getSpecificationGroupStatic($this->specification);
		return $this;
	}
	
	public function getDrawings()
	{
		$this->drawings = Drawing::getAllByIdProduct($this->id);
		return $this;
	}
    
	
}























