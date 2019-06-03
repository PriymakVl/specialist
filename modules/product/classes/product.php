<?php

class Product extends ProductBase {
	
	use ProductTotal, ProductConvert, ProductSpecification, ProductTime, ProductExtract;
	
    public function __construct($id_prod = false)
    {
        $this->tableName = 'products';
        parent::__construct($id_prod);
		$this->message->section = 'product';
    }
	
	public function addData()
	{
		$id_prod = $this->addDataModel();
		return (new self)->setData($id_prod);
	}
	
	public function getActions()
	{
		$this->actions = (new ProductAction)->getForProduct($this->symbol);
		return $this;
	}
	
	public function getParent()
	{
		if ($this->id_parent) $this->parent = new Product($this->id_parent);
		return $this;
	}
	
	public function getOrderProducts()
	{
		$order_products = (new OrderProduct)->getAllBySymbolModel($this->symbol);
		if (!$order_products) return $this;
		foreach ($order_products as $product) {
			$this->orderProducts[] = (new OrderProduct)->setData($product)->getOrder()->calculateTimeFact()->convertState();
		}
		return $this;
	}
	
	public function getDrawings()
	{
		$this->drawings = (new Drawing)->getAllBySymbolProduct($this->symbol);
		return $this;
	}
	
	public function deleteAll()
	{
		$this->delete();
		if ($this->specification) $this->deleteSpecification();
		return $this;
	}
	
	public function edit()
	{
		if ($this->post->edit_all) $this->editAll($this->symbol);
		else self::editOne();
		return $this;
	}
	
	public function copy()
	{
		$this->CopyTotal();
		return $this;
	}

	public function move()
	{
		$this->updateIdParenModel($this->session->id_prod_active);
		return $this;
	}
	
	public function search()
	{
		if ($this->post->symbol) return $this->searchBySymbol();
		// if ($items) return ObjectHelper::createArray($items, 'Product');
	}
			
    
	
}























