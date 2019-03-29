<?php

trait ProductModel  {

	use ProductParam;
	
    public function getAllByIdParent()
    {
        $sql = 'SELECT * FROM `products` WHERE `id_parent` = :id_parent AND `status` = :status ORDER BY `number`';
        $params = ['id_parent' => $this->id, 'status' => STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
    }
	
	public function addDataModel($params = false)
	{
		if (!$params) $params = self::selectParams(['symbol', 'name', 'qty', 'type', 'id_parent', 'note', 'number']);
		$fields = 'symbol, name, qty, type, id_parent, note, number';
        $values = ':symbol, :name, :qty, :type, :id_parent, :note, :number';
        $sql = 'INSERT INTO `products` ('.$fields.') VALUES ('.$values.')';
        return self::insert($sql, $params); 
	}
	
	public function editOne() 
	{
		$params = self::selectParams(['symbol', 'name', 'type', 'note', 'id_parent', 'id_prod', 'qty', 'number']);
		$sql = 'UPDATE `products` SET `symbol` = :symbol, `name` = :name, `type` = :type, `note` = :note, `id_parent` = :id_parent, 
				`qty` = :qty, `number` = :number WHERE `id` = :id_prod';
		return self::update($sql, $params);
	}
	
	public function editAllModel()
	{
		$params = self::selectParams(['symbol', 'name', 'type', 'note', 'symbol_old']);
		$sql = 'UPDATE `products` SET `symbol` = :symbol, `name` = :name, `type` = :type, `note` = :note WHERE `symbol` = :symbol_old';
		return self::update($sql, $params);
	}
	
	public function getAllBySymbol($symbol)
	{
		$sql = 'SELECT * FROM `products` WHERE `symbol` = :symbol AND `status` = :status';
        $params = ['symbol' => $symbol, 'status' => STATUS_ACTIVE];
        return self::perform($sql, $params)->fetchAll();
	}
	
}