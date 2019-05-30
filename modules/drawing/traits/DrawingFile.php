<?php

trait DrawingFile {
	
	public function saveFile()
	{
		if(empty($_FILES) || $_FILES['file']['error'] != 0) return false;
		$id_last = self::getLastId('drawings');
		$filename = $this->setFileName($id_last);
		if ($this->moveFile($filename)) return $filename;
	}
	
	private function moveFile($filename)
	{
		$destination = './drawings/'.$filename;
		return move_uploaded_file($_FILES['file']['tmp_name'], $destination);
	}
	
	private function setFileName($id_last)
	{
		$id_last = $id_last ? $id_last : 0;
		$file = explode('.', $_FILES['file']['name']);
		return ($id_last + 1).'.'.$file[1];
	}
    
	
}























