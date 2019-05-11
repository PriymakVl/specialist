<?php

class Controller_Debug extends Controller_Base {

    public function action_order_products()
	{
		$orders = Order::getAll('orders');
		foreach ($orders as $order) {
			$order_actions = (new OrderAction)->getByIdOrderModel($order->id);
			$order_products = (new OrderProduct)->getByIdOrderModel($order->id);
			$this->addProductContent($order_products, $order_actions);
			$this->setDateExecution($order, $order_actions);
		}
		debug('exit');
	}
	
	public function addProductContent($order_products, $order_actions) {
		foreach ($order_products as $order_product) {
			$data = (new Product)->getData($order_product->id_prod, false);
			if (!$data || !$data->status) continue;
			$product_base = (new Product)->setData($data);
			$this->changeIdProdToActions($order_product, $order_actions);
			$children = $product_base->getByIdParentModel();
			if ($product_base->type) (new OrderProduct)->setData($order_product)->setType($product_base->type);
			if ($children) $this->addChildrenProduct($order_product, $children, $order_actions);
		}
	}
	
	public function changeIdProdToActions($order_product, $order_actions) {
		foreach ($order_actions as $action) {
			if ($action->id_prod == $order_product->id_prod) {
				$params = ['id_action' => $action->id, 'id_prod_ord' => $order_product->id];
				(new OrderAction)->updateIdProdOrderModel($params);
			}
		}
	}
	
	public function addChildrenProduct($parent_ord, $children, $order_actions) {
		foreach ($children as $child) {
			if (!ObjectHelper::inPropertyValue($order_actions, 'id_prod', $child->id)) continue;
			$order_child = $this->addOrderProduct($parent_ord, $child);
			if ($child->type) $order_child->setType($child->type);
			$this->changeIdProdToActions($order_child, $order_actions);
		}
	}
	
	public function addOrderProduct($parent_ord, $product_base)
	{
		$order_product = new OrderProduct;
		$order_product->get->id_order = $parent_ord->id_order;
		$order_product->get->id_prod = $product_base->id;
		if ($parent_ord->qty) $order_product->get->qty = $parent_ord->qty;
		$order_product->addProductBase()->setIdProdModel($product_base->id);
		return (new OrderProduct)->setData($order_product->id);
	}
	
	public function setDateExecution($order, $actions)
	{
		$this->setDateExeProducts($order);
		$this->setDateExeActions($order, $actions);
	}
	
	public function setDateExeProducts($order)
	{
		if (!$order->date_exec) return;
		$products = (new OrderProduct)->getByIdOrderModel($order->id);
		if(!$products) return;
		foreach ($products as $product) {
			(new OrderProduct)->setData($product)->updateDateExeModel($order->date_exec);
		}
	}
	
	public function setDateExeActions($order, $actions)
	{
		if (!$order->date_exec) return;
		if (!$actions) return;
		foreach ($actions as $action) {
			(new OrderAction)->setData($action)->updateDateExeModel($order->date_exec);
		}
	}



}