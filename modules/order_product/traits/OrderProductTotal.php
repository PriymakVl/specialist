<?php

trait OrderProductTotal  {
	
	use OrderProductModel;

	public function getMainParentOrder($id_order)
	{
        $items = $this->getMainParentOrderModel($id_order);
		if ($items) return ObjectHelper::createArray($items, 'OrderProduct', ['setData', 'getSpecification', 'getOptions', 'convertState']);
	}

	public function getAllForOrder()
	{
		$parent = (new Product)->getData($this->params->id_prod)->getSpecification();
		self::$products[] = $parent;
		if ($parent->specification) self::getAllProductsParent($parent->specification);
	}
	
	public function deleteAll($id_order, $ids) 
	{
		foreach ($ids as $id) {
			self::deleteOne($id_order, $id);
		}
	}
	
	public function deleteOne($id_order, $id_prod)
	{
		$sql = 'UPDATE `order_content` SET `status` = :status WHERE `id_prod` = :id_prod AND `id_order` = :id_order';
		$params = ['id_order' => $id_order, 'id_prod' => $id_prod, 'status' => self::STATUS_DELETE];
		return self::perform($sql, $params);
	}
	
	public function addByPositionsOrder($positions)
	{
		foreach ($positions as $position) {
			if (!$position->symbol) continue;
			$symbol = explode('x', $position->symbol)[0];//get symbol product without length cylinder
			$items = Product::getAllBySymbol($symbol);
			if (empty($items)) continue;
			self::add($position->id_order, $items[0]->id, $position->qty);
		}
	}
	

	
	
	
	
	
	

	
	

	
	
}























