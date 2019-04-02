<?php

class Drawing extends Model {
	
	use DrawingFile, DrawingMessage, DrawingModel;

    public function __construct($id_dwg = false)
    {
        $this->tableName = 'drawings';
        parent::__construct($id_dwg);
		$this->message->section = 'drawing';
    }
	
	public function editNote()
	{
		$this->editNoteModel();
		return $this;
	}
	
	public function addFile()
	{
		$filename = $this->saveFile();
		$id_dwg = $filename ? $this->addDataModel($filename) : false;
		if ($id_dwg) $this->setData($id_dwg);
		return $this;
	}
	

}























