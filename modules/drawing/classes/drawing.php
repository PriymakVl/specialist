<?php

class Drawing extends Model {
	
	use DrawingStatic, DrawingMessage;

    public function __construct($id_dwg = false)
    {
        $this->tableName = 'drawings';
        parent::__construct($id_dwg);
		$this->message->section = 'drawing';
    }
	
	public function editNote()
	{
		self::editNoteModel();
		return $this;
	}
	
	public function addFile()
	{
		$filename = self::addFileStatic();
		$id_dwg = $filename ? self::addDataModel(['filename' => $filename, 'id_user' => $this->session->id_user]) : false;
		if ($id_dwg) self::getData($id_dwg);
		return $this;
	}
	

}























