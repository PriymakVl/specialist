<?php
require_once('product_static.php');

class Product extends ProductStatic {
	
	public $parent;
	public $typeViewSpecification;
	public $actions;

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
		return $this;
	}
	
	public function getActions()
	{
		$this->actions = ProductAction::getAllBySymbol($this->symbol);
		return $this;
	}
	
	public function setBgTerminalProductBox()
	{
		if ($this->stateWork == Order::STATE_WORK_PROGRESS) $this->bgTerminalProductBox = self::BG_TERMINAL_BOX_PROGRESS;
		else if ($this->stateWork == Order::STATE_WORK_STOPPED) $this->bgTerminalProductBox =  self::BG_TERMINAL_BOX_STOPPED;
		else $this->bgTerminalProductBox = self::BG_TERMINAL_BOX_PLAN;
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
	
	//for item specification product
	public function countTimeProductionTotal()
	{
		if (!$this->time_prod) return;
		$qty = $this->quantity ? $this->quantity : 1;
		$this->timeProductionTotal = $qty * $this->time_prod;
		return $this;
	}
    
	
}























