<?php

trait OrderProductTotal  {
	
	use OrderProductModel;

	public function getMainParentOrder($id_order)
	{
        $items = $this->getMainParentOrderModel($id_order);
		$methods = ['setData', 'getSpecification', 'convertState', 'getActions'];
		if ($items) return ObjectHelper::createArray($items, 'OrderProduct', $methods);
	}

	// public function getAllForOrder()
	// {
		// $parent = (new Product)->getData($this->params->id_prod)->getSpecification();
		// self::$products[] = $parent;
		// if ($parent->specification) self::getAllProductsParent($parent->specification);
	// }
	
	// public function deleteAll($id_order, $ids) 
	// {
		// foreach ($ids as $id) {
			// self::deleteOne($id_order, $id);
		// }
	// }
	
	// public function deleteOne($id_order, $id_prod)
	// {
		// $sql = 'UPDATE `order_content` SET `status` = :status WHERE `id_prod` = :id_prod AND `id_order` = :id_order';
		// $params = ['id_order' => $id_order, 'id_prod' => $id_prod, 'status' => self::STATUS_DELETE];
		// return self::perform($sql, $params);
	// }
	
	// public function addByPositionsOrder($positions)
	// {
		// foreach ($positions as $position) {
			// if (!$position->symbol) continue;
			// $symbol = explode('x', $position->symbol)[0];
			// $items = Product::getAllBySymbol($symbol);
			// if (empty($items)) continue;
			// self::add($position->id_order, $items[0]->id, $position->qty);
		// }
	// }
	
	public function addProductList($products) 
	{
		foreach ($products as $product) {
			$params = ['id_prod' => $product->id, 'qty' => $product->qty, 'id_parent' => self::ID_MAIN_PARENT, 'state' => self::STATE_WAITING, 'id_order' =>  $product->id_order];
			$id_parent = $this->addOne($params);
			(new self)->setData($id_parent)->addSpecification($product->id);
		}
		return $this;
	}
	
	public function addActionList($id_order)
	{
		$products = $this->getAllForOrder($id_order);
		if ($products) (new OrderAction)->addActions($products);
		return $this;
	}
	
	public function getAllNotStateEnded()
	{
		$items = $this->getAllNotStateEndedModel();
		if ($items) return ObjectHelper::createArray($items, 'OrderProduct', ['setData', 'getOrder', 'convertState']);
	}
	
	public function getAllForOrderNotStateEnded()
	{
		$items = $this->getAllForOrderNotStateEndedModel();
		if ($items) return ObjectHelper::createArray($items, 'OrderProduct', ['setData', 'getActions']);
	}
	

	
	
	
	
	
	

	
	

	
	
}























