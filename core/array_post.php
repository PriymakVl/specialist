<?php

class ArrayPost {
	
	public $data;
	
	public function __construct()
	{
		$this->data = $_POST;
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