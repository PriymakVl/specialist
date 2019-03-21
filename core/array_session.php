<?php

class ArraySession {
	
	public $data;
	
	public function __construct()
	{
		$this->data = $_SESSION;
	}
	
	public function __set($name, $value) 
	{
		return null;
	}
 
	public function __get($name) 
	{
		if (isset($this->data[$name])) return $this->data[$name];
	}
}