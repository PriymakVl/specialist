<?php

class OrderPosition extends Model {
	
	use OrderPositionStatic;
	
	public function __construct($id_position = false)
	{
		parent::__construct($id_position);
		$this->message->section = 'order_position';
		$this->tableName = 'order_positions';
	}
	
	public function addData()
	{
        $id_position = self::addDataModel();
		return (new self)->getData($id_position);
	}
	
	public function editData()
	{
		self::editDataModel();
		return $this;
	}
	
	public function getData($id_position = false)
	{
		$id_position = $id_position ? $id_position : $this->get->id_position;
		if (empty($id_position)) return exit('Not id_position in method getData');
		parent::getData($id_position);
		return $this;
	}
	
	
	
}























