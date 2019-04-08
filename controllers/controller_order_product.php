<?php

class Controller_Order_Product extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/order_product/views/';
		$this->message->section = 'order_product';
    }

	public function action_index()
	{
		$product = (new OrderProduct)->setData($this->get->id_prod)->getParent()->getOrder()->getSpecification()->getActions();
		$this->setTitle('Продукт '.$product->symbol)->render('index/main', compact('product'));
	}
	
	public function action_activate()
    {
        // $this->setSession('id_order_active', $this->get->id_order)->redirectPrevious();
    }

	public function action_add_base()
	{
		if (!$this->session->id_order_active) $this->setMessage('error', 'not_active', 'order')->redirectPrevious();
		$product = (new OrderProduct)->addProductBase()->addSpecification()->setState(OrderState::PREPARATION)->setMessage('success', 'add');
		$this->redirect('order_action/add_for_product?id_prod='.$product->id);
	}
	
	public function action_add_form()
	{
		$order = new Order($this->get->id_order);
		if (!$this->post->save) return $this->render('add/main', compact('order'));
		$product = (new OrderProduct)->addProductForm()->setMessage('success', 'add');
		$this->redirect('order?id_order='.$order->id);	
	}
	// public function action_to_preparation()
	// {
		// $order = new Order($this->id_order);
		// $order->getPositions()->toPreparation()->setState(OrderState::PREPARATION)->setMessage('success', 'preparation');
		// Session::set('order-active', $this->id_order);
		// $this->redirectPrevious();
	// }
	
	public function action_edit()
	{
		$product = (new OrderProduct)->setData($this->get->id_prod);
		if (!$this->post->save) return $this->setTitle('Редактирование продукта')->render('edit/main', compact('product'));
		$product->edit()->setMessage('success', 'edit');
		//->checkStateOrder();
		$this->redirect('order?tab='.self::ORDER_TAB_PRODUCTS.'&id_order='.$product->id_order.'&id_active='.$product->id);
	}
	
	public function action_delete()
	{
		$product = (new OrderProduct)->setData($this->get->id_prod)->getSpecification()->deleteAll()->setStateOrder();
		$this->setMessage('success', 'delete')->redirect('order?tab='.self::ORDER_TAB_PRODUCTS.'&id_order='.$product->id_order);
	}
    

	
}