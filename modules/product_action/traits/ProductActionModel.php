<?php

trait ProductActionModel {
	
	public function getAllBySymbolProductModel($symbol)
    {
        $sql = 'SELECT * FROM `product_actions` WHERE `symbol` = :symbol AND `status` = :status ORDER BY `number`';
        return self::perform($sql, ['symbol' => $symbol, 'status' => STATUS_ACTIVE])->fetchAll();
    }
	
	public function addDataModel()
	{
		$params = $this->addDataModelParams();
        $sql = 'INSERT INTO `product_actions` (symbol, name, price, time_prod, time_prepar, number, note) 
			VALUES (:symbol, :name, :price, :time_prod, :time_prepar, :number, :note)';
        return self::insert($sql, $params); 
	}
	
	public function editDataModel()
	{
		$params = $this->editDataModelParams();
		$sql = 'UPDATE `product_actions` SET `name` = :name, `price` = :price, `time_prod` = :time_prod, `time_prepar` = :time_prepar, `number` = :number, 
		`note` = :note WHERE `id` = :id_action';
		return self::perform($sql, $params); 
	}
	
	public function editSymbolProductModel()
	{
		$params['symbol'] = trim(self::getParam('symbol'));
		$params['symbol_old'] = $this->symbol;
		$sql = 'UPDATE `product_actions` SET `symbol` = :symbol WHERE `symbol`= :symbol_old';
		return self::perform($sql, $params); 
	}
}