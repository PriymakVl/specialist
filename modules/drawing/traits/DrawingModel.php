<?php

trait DrawingModel  {
	
	use DrawingParam;
	
	public static function getAllByIdProduct($id_prod)
    {
        $sql = 'SELECT * FROM `drawings` WHERE `id_prod` = :id_prod AND `status` = :status';
		$params = ['id_prod' => $id_prod, 'status' => STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
    }
	
	protected static function addDataModel($data)
	{
		$params = self::addDataModelParams($data);
		$sql = 'INSERT INTO `drawings` (filename, id_prod, note, date_add, id_user) VALUES (:filename, :id_prod, :note, :date_add, :id_user)';
        return self::insert($sql, $params); 
	}
	
	protected static function editNoteModel()
	{
		$params = self::selectParams(['note', 'id_dwg']);
		$sql = 'UPDATE `drawings` SET `note` = :note WHERE `id` = :id_dwg';
		return self::update($sql, $params); 
	}
    
	
}























