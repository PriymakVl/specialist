<?php

trait ProductActionModel {

	use Param;
	
	public function getAllBySymbolProduct($symbol)
    {
        $sql = 'SELECT * FROM `product_actions` WHERE `symbol` = :symbol AND `status` = :status ORDER BY `number`';
        return self::perform($sql, ['symbol' => $symbol, 'status' => STATUS_ACTIVE])->fetchAll();
    }
	
	public function addDataModel()
	{
		$params = self::selectParams(['symbol', 'id_data', 'time_prod', 'time_prepar', 'number']);
        $sql = 'INSERT INTO `product_actions` (symbol, id_data, time_prod, time_prepar, number) 
			VALUES (:symbol, :id_data, :time_prod, :time_prepar, :number)';
        return self::insert($sql, $params); 
	}
	
	public function editDataModel()
	{
		$params = self::selectParams(['id_action', 'id_data', 'time_prod', 'time_prepar', 'number']);
		$sql = 'UPDATE `product_actions` SET `time_prod` = :time_prod, `time_prepar` = :time_prepar, `number` = :number, 
		`id_data` = :id_data WHERE `id` = :id_action';
		return self::perform($sql, $params); 
	}
	
	public function editSymbolProduct()
	{
		$params['symbol'] = self::getParam('symbol');
		$params['symbol_old'] = $this->symbol;
		$sql = 'UPDATE `product_actions` SET `symbol` = :symbol WHERE `symbol`= :symbol_old';
		return self::perform($sql, $params); 
	}
}