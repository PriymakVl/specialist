<?php

trait DrawingStatic {
	
	use DrawingModel;
	
	public static function addFileStatic()
	{
		if(empty($_FILES) || $_FILES['file']['error'] != 0) return false;
		$id_last = self::getLastId('drawings');
		$filename = self::setFileName($id_last);
		if (self::saveFile($filename)) return $filename;
	}
	
	private static function saveFile($filename)
	{
		$destination = './web/drawings/'.$filename;
		return move_uploaded_file($_FILES['file']['tmp_name'], $destination);
	}
	
	private static function setFileName($id_last)
	{
		$id_last = $id_last ? $id_last : 0;
		$file = explode('.', $_FILES['file']['name']);
		return ($id_last + 1).'.'.$file[1];
	}
    
	
}























