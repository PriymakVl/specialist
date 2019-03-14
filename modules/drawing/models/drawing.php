<?php
require_once('./core/model.php');

class Drawing extends Model {

    public function __construct($id_dwg)
    {
        $this->tableName = 'drawings';
        parent::__construct($id_dwg);
		$this->message->section = 'drawing';
    }
	
	public static function getAllByIdProduct($id_prod)
    {
        $sql = 'SELECT * FROM `drawing` WHERE `id_prod` = :id_prod AND `status` = :status';
		$params = ['id_prod' => $id_prod, 'status' => self::STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
    }
	
	public static function add($params)
	{
		if(empty($_FILES) || $_FILES['file']['error'] != 0) return false;
		debug('dd');
		$id_last = self::getLastId('products');
		debug($id_last);
		$id = self::addToDatabase($params);
		return self::addFile($id);
	}
	
	private static function addFile($id)
	{
		$filename = self::setFileName($id);
		debug($filename);
		$path = '/web/drawings/'.$filename;
		return move_uploaded_file($_FILES['file']['tmp_name'], $path );
	}
	
	private static function setFileName($id)
	{
		$file = explode('.', $_FILES['file']['name']);
		return $id.$file[1];
	}
	
	private static function addToDatabase($params)
	{
		unset($params['save']);
		$fields = 'name, note';
        $values = ':symbol, :name, :quantity, :type, :id_parent, :note, :number';
        $sql = 'INSERT INTO `drawings` (name, note) VALUES (:n)';
        return self::insert($sql, $params); 
	}
    
	
}























