<?php
require_once('user_static.php');

class User extends UserStatic {

    public function __construct($user_id = false)
    {
        $this->tableName = 'users';
        parent::__construct($user_id);
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
		$this->defaultTypeOrder = $this->setOption('default_type_order', $options);
	}
	
	public function setPosition()
	{
		if (empty($this->options['position'])) throw new Exception('error-position');
		$this->position = $this->options['position'];
		return $this;
	}
	
	private function setOption($name_option, $options)
	{
		foreach ($options as $option) {
			if ($option->name == $name_option) return $option->value;
		}
		return null;
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























