<?php

trait OrderModel {
	
	use OrderParam, OrderModelSelect;

    public function addDataModel()
    {
		$params = $this->addDataParam(['symbol', 'note', 'date_exec', 'type', 'state', 'rating']);
        $fields = 'symbol, note, date_exec, type, state, rating, date_reg';
        $values = ':symbol, :note, :date_exec, :type, :state, :rating, :date_reg';
        $sql = 'INSERT INTO `orders` ('.$fields.') VALUES ('.$values.')';
		return self::insert($sql, $params);
    }
	
	public function editData()
	{
		$params = $this->editDataParam();
		$sql = 'UPDATE `orders` SET `symbol` = :symbol, `date_exec` = :date_exec, `type` = :type, `note` = :note, `rating` = :rating WHERE `id` = :id_order';
		return self::update($sql, $params);
	}
	
}























