<?php

class User extends UserBase {
	
	use UserStatic;

    public function __construct($id_user = false)
    {
        $this->tableName = 'users';
        parent::__construct($id_user);
		$this->message->section = 'user';
    }
	
	public function getOptions() 
	{
		$this->options = UserOptions::get($this->id);
		return $this;
	}
	
	public function setOptions()
	{
		if ($this->position == POSITION_WORKER) return 
		$this->defaultProductAction = $this->setOption('default_product_action', $options);
	}
	
	private function setOption($name_option, $options)
	{
		foreach ($options as $option) {
			if ($option->name == $name_option) return $option->value;
		}
		return null;
	}
	
	public function getDefaultStateOrders()
	{
		if ($this->options->default_state_orders) $this->defaultStateOrders = $this->options->default_state_orders;
		else $this->defaultStateOrders = OrderState::REGISTERED;
		return $this;
	}
	
	public function login()
	{
		try {
			return self::loginStatic(trim($this->post->password));
		} catch (Exception $e) {;
			$flag = explode('_', $e->getMessage())[1];//login or password
			$this->setMessage($flag, $e->getMessage());
			return false;
		}
	}


    
	
}























