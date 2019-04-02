<?php

trait DrawingModel  {
	
	use DrawingParam;
	
	public function getAllBySymbolProduct($symbol)
    {
        $sql = 'SELECT * FROM `drawings` WHERE `symbol` = :symbol AND `status` = :status';
		$params = ['symbol' => $symbol, 'status' => STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
    }
	
	protected function addDataModel($filename)
	{
		$params = $this->addDataParams($filename);
		$sql = 'INSERT INTO `drawings` (filename, symbol, note, date_add, id_user) VALUES (:filename, :symbol, :note, :date_add, :id_user)';
        return self::insert($sql, $params); 
	}
	
	protected function editNoteModel()
	{
		$params = self::selectParams(['note', 'id_dwg']);
		$sql = 'UPDATE `drawings` SET `note` = :note WHERE `id` = :id_dwg';
		return self::update($sql, $params); 
	}
    
	
}























