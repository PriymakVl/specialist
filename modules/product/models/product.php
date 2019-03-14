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
    }
	
	public function getSpecification()
	{
		$this->specification = self::getAllByIdParent($this->id);
		$this->getTypeViewSpecification();
		if ($this->typeViewSpecification == 'category') $this->getChildrenSpecification();
		else $this->dividedOnGroupsByType();
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
	
	private function getTypeViewSpecification()
	{
		foreach ($this->specification as $item) {
			if ($item->type == self::TYPE_CATEGORY) {
				$this->typeViewSpecification = 'category';
				break;
			}
		}
	}
	
	private function getChildrenSpecification()
	{
		foreach($this->specification as $item) {
			$item->getSpecification();
		}
	}
	
	public function countTimeManufacturingOrder()
	{
		if (!$this->time_prod) return;
		$this->timeManufacturingOrder = ($this->orderQtyAll * $this->time_prod) + $this->time_prepar;
		return $this;
	}
	
	public function countTimeManufacturing()
	{
		$this->timeManufacturing = ProductTime::countTimeManufacturing($this);
		if ($this->specification) {
			$time_manufac_specif = ProductTime::countTimeManufacSpecif($this->content);
			$this->timeManufacturing = $this->timeManufacturing + $time_manufac_specif;
		}
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
	
	public function dividedOnGroupsByType()
	{
		foreach ($this->specification as $item) {
			if($item->type == self::TYPE_UNIT) $this->specificationGroup['unit'][] = $item;
			else if ($item->type == self::TYPE_DETAIL)  $this->specificationGroup['detail'][] = $item;
			else if ($item->type == self::TYPE_STANDARD)  $this->specificationGroup['standard'][] = $item;
			else if ($item->type == self::TYPE_OTHER)  $this->specificationGroup['other'][] = $item;
		}
		return $this;
	}
	
	public function getDrawings()
	{
		$this->drawings = Drawing::getAllByIdProduct($this->id);
		return $this;
	}
    
	
}























