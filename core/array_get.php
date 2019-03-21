<?php

class ArrayGet {
	
	public $data;
	
	public function __construct()
	{
		$this->data = $_GET;
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