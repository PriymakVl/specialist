<?php
require_once('product_static.php');

class Product extends ProductStatic {

    public function __construct($user_id)
    {
        $this->tableName = 'products';
        parent::__construct($user_id);
    }
	
	public function getSpecification()
	{
		$this->specification = self::getAllByIdParent($this->id);
	}
	
	public function setBgTerminalProductBox()
	{
		if ($this->stateWork == Order::STATE_WORK_PROGRESS) $this->bgTerminalProductBox = self::BG_TERMINAL_BOX_PROGRESS;
		else if ($this->stateWork == Order::STATE_WORK_STOPPED) $this->bgTerminalProductBox =  self::BG_TERMINAL_BOX_STOPPED;
		else $this->bgTerminalProductBox = self::BG_TERMINAL_BOX_PLAN;
	}
	
	public function getIimeManufacturing()
	{
		$result = ProductTime::get($this->symbol);
		$this->timeProduction = $result->time_prod;
		$this->timePreparation = $result->time_prepar;
		return $this;
	}
    
	
}























