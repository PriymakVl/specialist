<?php

trait OrderProductModelSelect {

	// public function get($id_order)
	// {
		// $sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status';
        // $params = ['id_order' => $id_order, 'status' => STATUS_ACTIVE];
        // $items = self::perform($sql, $params)->fetchAll();
        // return self::createArrayContent($items);
	// }
	
	// public function getMainParentOrderModel($id_order)
	// {
		// $sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status AND `id_parent` = :id_parent';
        // $params = ['id_order' => $id_order, 'status' => STATUS_ACTIVE, 'id_parent' => self::ID_MAIN_PARENT];
        // return self::perform($sql, $params)->fetchAll();
	// }
	
	public function getByIdParentModel($id_parent = false)
	{
		$sql = 'SELECT * FROM `order_products` WHERE `status` = :status AND `id_parent` = :id_parent';
        $params = ['status' => STATUS_ACTIVE, 'id_parent' => $id_parent ? $id_parent : $this->id];
        return self::perform($sql, $params)->fetchAll();
	}
	
	public function getAllForOrderModel()
	{
		$params = ['id_order' => $this->get->id_order, 'status' => STATUS_ACTIVE];
		$sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status ORDER BY state DESC, rating DESC, date_exec DESC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	//2 state waiting and work
	// public function getAllNotStateEndedModel()
	// {
		// $params = $this->getAllNotStateEndedParam();
		// $sql = 'SELECT * FROM `order_products` WHERE `type_order` = :type_order AND `state` <> :state AND `status` = :status
			// ORDER BY state DESC, rating DESC, date_exec DESC';
		// return self::perform($sql, $params)->fetchAll();
	// }
	
	
}