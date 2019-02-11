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

    // public function getSpecifications()
    // {
        // $this->specifications = Specification::getAllForProduct($this->id);
        // return $this;
    // }




//    public function update()
//    {
//        $state = Param::get('state');
//        $date_state = time();
//
//        if ($this->state == $state) $date_state = $this->date_state ? $this->date_state : time();
//        else OrderState::set($this->id, $state);//for show history update
//
//        $sql = "UPDATE `orders` SET `number` = :number, `date_exec` = :date_exec, `state` = :state, `date_state` =".$date_state;
//        $sql .= ',`note` = :note, `type` = :type, `letter` = :letter, `count_pack` = :count_pack WHERE `id` ='.$this->id;
//        self::perform($sql, Param::forUpdateOrder());
//    }
    
	
}























