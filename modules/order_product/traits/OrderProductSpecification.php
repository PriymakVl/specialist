<?php

trait OrderProductSpecification {

	public function getSpecificationArray()
	{
		$this->specification = $this->getSpecificationModel();
		return $this;
	}
	
	public function getSpecification()
	{
		$specification = $this->getSpecificationModel();
		$methods = ['setData', 'getOptions'];
		if ($specification) $this->specification = ObjectHelper::createArray($specification, 'OrderProduct', $methods);
		return $this;
	}
	
	public function getSpecificationModel()
	{
		$params = self::selectParams(['id_order', 'status']);
		$params['id_parent'] = $this->id;
		$sql = 'SELECT * FROM `order_products` WHERE `id_order` = :id_order AND `status` = :status AND `id_parent` = :id_parent';
        return self::perform($sql, $params)->fetchAll();
	}
	
	/** add specification **/
	
	public function addSpecification()
	{
		$prod_base = (new Product)->getData($this->get->id_prod)->getSpecification();
		if (!$prod_base->specification) return $this;
		$this->addSpecificationRecursive($prod_base->specification, $this->id_order);
		return $this;
	}
	
	public function addSpecificationRecursive($specification)
	{
		foreach ($specification as $product) {
			//$product->getSpecification();
			//if ($product->specification) $this->addSpecificationRecursive($product->specification);
			$qty = $product->qty * $this->qty;
			$params = ['qty' => $qty, 'id_parent' => $this->id, 'id_prod' => $product->id, 'id_order' => $this->id_order, 'state' => self::STATE_WAITING];
			$this->addOne($params);
		}
		return $this;
	}
	
	/** delete specification **/
		
	public function deleteSpecification()
	{
		if (!$this->specification) return $this;
		foreach ($this->specification as $product) {
			$product->getSpecification();
			if ($product->specification) $product->deleteSpecification();
			$product->delete();
		}
		return $this;
	}
	


}