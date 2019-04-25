<?php

class UserBase extends Model
{

	public $defaultTypeOrder;
	public $defaultProductActions = [];
	public $defaultStateOrder;//for show on list orders
	public $options;
	
	const POSITION_SUPER_ADMIN = 1;
	const POSITION_ADMIN = 2;
	const POSITION_BOSS = 3;
	const POSITION_DESINGER = 4;
	const POSITION_MANAGER = 5;
	const POSITION_WORKER = 6;
	
	 const COST_WORK_MINUTE = '0.85';
	 const ACTION_UNIVER = 2;
	 const ACTION_CHPU = 3;
	 const ACTION_FREZ = 4;
	 const ACTION_ASSEMB = 6;
	 
	public function __construct($id_user = false)
    {
        $this->tableName = 'users';
        parent::__construct($id_user);
		$this->message->section = 'user';
    }
	 
	 public function setProperties()
	 {
		$this->options = UserOptions::get($this->id);
		if (isset($this->options->default_product_actions)) $this->setDefaultProductActions();
		if (isset($this->options->default_type_order)) $this->defaultTypeOrder = $this->options->default_type_order; 
		if (isset($this->options->default_state_order)) $this->defaultStateOrder = $this->options->default_state_order; 
		return $this;
	 }
	 
	 private function setDefaultProductActions()
	 {
		 $ids = unserialize($this->options->default_product_actions);
		 foreach ($ids as $id) {
			 $action = (new Action)->setData($id);
			 if ($action->data) $this->defaultProductActions[] = $action->name;
		 }
	 }
	

}