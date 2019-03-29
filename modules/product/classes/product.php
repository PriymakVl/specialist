<?php

class Product extends ProductBase {
	
	use ProductTotal, ProductConvert, ProductSpecification, ProductTime;
	
    public function __construct($id_prod = false)
    {
        $this->tableName = 'products';
        parent::__construct($id_prod);
		$this->message->section = 'product';
    }
	
	public function addData()
	{
		$id_prod = $this->addDataModel();
		return (new self)->setData($id_prod);
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
		if ($this->post->edit_all) $this->editAll($this->symbol);
		else self::editOne();
		return $this;
	}
	
	public function copy()
	{
		$this->CopyTotal();
		return $this;
	}
			
    
	
}























