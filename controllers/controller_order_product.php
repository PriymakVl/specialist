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
		// $order = new Order($this->get->id_order);
		// $order->getPositions()->getContent()->convertState()->getActions()->getActionsUnplan()->convertRating();
		// $this->render('index/main', compact('order'));
	}

	public function action_list()
	{
		// $user = (new User)->getData($this->session->id_user)->getOptions()->getDefaultStateOrders();
		// $state = $this->get->state ? $this->get->state : $user->defaultStateOrders;
		// $orders = Order::getList($state);
        // $this->view->title = 'Заказы';
		// $this->render('list/main', compact('orders', 'state'));
	}
	
	public function action_activate()
    {
        // $this->setSession('id_order_active', $this->get->id_order)->redirectPrevious();
    }

	public function action_add()
	{
		$id_order = Session::get('order-active');
		if (!$this->session->id_order_active) $this->message->set('error', 'not-active', 'order')->redirectPrevious();
		$order = (new Order)->getData($id_order)->addContent();
		//->setMessage('success', 'add-content')->setState(OrderState::PREPARATION);
		$this->redirect('order?id_order='.$order->id);
	}
	
	public function action_to_preparation()
	{
		$order = new Order($this->id_order);
		$order->getPositions()->toPreparation()->setState(OrderState::PREPARATION)->setMessage('success', 'preparation');
		Session::set('order-active', $this->id_order);
		$this->redirectPrevious();
	}
	
	public function action_change_qty()
	{
		$params = ParamOrder::changeQtyProduct();
		OrderContent::changeQuantity($params);
		$this->message->set('success', 'edit_qty');
		$this->redirectPrevious();
	}
	
	public function action_delete()
	{
		OrderProduct::deleteList();
		$this->setMessage('success', 'delete_list')->redirect('order?id_order='.$this->id_order);
	}
    

	
}