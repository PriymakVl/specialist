<?php
require_once('order_product_static.php');

class OrderProduct extends OrderProductStatic {

	public function __construct($id)
    {
        $this->tableName = 'order_products';
        parent::__construct($id);
    }
	
	
}























