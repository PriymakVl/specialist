<?php
require_once('product_static.php');

class Product extends ProductStatic {
	
	public $parent;
	public $typeViewSpecification;

    public function __construct($user_id)
    {
        $this->tableName = 'products';
        parent::__construct($user_id);
    }
	
	public function getSpecification()
	{
		$this->specification = self::getAllByIdParent($this->id);
		$this->getTypeViewSpecification();
		if ($this->typeViewSpecification == 'category') $this->getChildrenSpecification();
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
	
	// public function getIimeManufacturing()
	// {
		// $result = ProductTime::get($this->symbol);
		// if (empty($result)) return;
		// $this->timeProduction = $result->time_prod;
		// $this->timePreparation = $result->time_prepar;
		// return $this;
	// }
	
/* 	public function setTimeManufacturing()
	{
		$this->timeProduction = date('i', $this->time_prod);
		$this->timePreparation = date('i', $this->time_prepar);
	} */
	
	public function countTimeManufacturingOrder()
	{
		if (!$this->time_prod) return;
		$this->timeManufacturingOrder = ($this->orderQtyAll * $this->time_prod) + $this->time_prepar;
		return $this;
	}
    
	
}























