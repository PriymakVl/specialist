<?php
require_once('./core/model.php');

class DrawingModel extends Model {
	
	public static function getAllByIdProduct($id_prod)
    {
        $sql = 'SELECT * FROM `drawings` WHERE `id_prod` = :id_prod AND `status` = :status';
		$params = ['id_prod' => $id_prod, 'status' => self::STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
    }
	
	protected static function addToDatabase($params)
	{
		unset($params['save']);
        $sql = 'INSERT INTO `drawings` (filename, id_prod, note, date_add) VALUES (:filename, :id_prod, :note, :date_add)';
        return self::insert($sql, $params); 
	}
	
	protected static function updateNote($params)
	{
		unset($params['save'], $params['id_prod']);
		$sql = 'UPDATE `drawings` SET `note` = :note WHERE `id` = :id_dwg';
		return self::update($sql, $params); 
	}
    
	
}























