<?php

class Product extends ProductBase {
	
	use ProductStatic;
	
    public function __construct($id_prod = false)
    {
        $this->tableName = 'products';
        parent::__construct($id_prod);
		$this->message->section = 'product';
    }
	
	public function getSpecification()
	{
		$this->specification = self::getSpecificationStatic($this->id);
		return $this;
	}
	//чтобы показывать в виде категории
	public function getSpecificationChildren()
	{
		if ($this->id == ID_CATEGORY_PRODUCTS || $this->id == ID_CATEGORY_CYLINDER || $this->id == ID_CATEGORY_PRESS) {
			self::getSpecificationChildrenStatic($this->specification);
		}
		return $this;
	}
	
	public function addData()
	{
		$id_prod = self::addDataModel();
		return (new self)->getData($id_prod);
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
		if ($this->actions) $this->timeActions = ProductTime::countTimeProductActions($this->actions, $this->quantity);
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
	
	public function delete()
	{
		parent::delete();
		//if ($this->specification) self::deleteSpecification($this->specification);
		//todo write method deleteSpecification;
		return $this;
	}
	
	public function edit()
	{
		if ($this->post->edit_all) self::editAll($this->symbol);
		else self::editOne();
		return $this;
	}
			
    
	
}























