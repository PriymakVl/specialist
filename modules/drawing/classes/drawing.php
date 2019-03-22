<?php
require_once('drawing_static.php');

class Drawing extends DrawingStatic {

    public function __construct($id_dwg)
    {
        $this->tableName = 'drawings';
        parent::__construct($id_dwg);
		$this->message->section = 'drawing';
    }
	
	public function editNote($params)
	{
		self::updateNote($params);
		return $this;
	}
    
	
}























