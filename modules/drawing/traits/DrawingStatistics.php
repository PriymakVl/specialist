<?php
require_once('drawing_model.php');

class DrawingStatic extends DrawingModel {
	
	public static function add($params)
	{
		if(empty($_FILES) || $_FILES['file']['error'] != 0) return false;
		$id_last = self::getLastId('drawings');
		$params['filename'] = self::setFileName($id_last);
		self::addToDatabase($params);
		return self::addFile($params['filename']);
	}
	
	private static function addFile($filename)
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























