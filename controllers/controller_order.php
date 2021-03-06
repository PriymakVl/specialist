<?php

class Controller_Order extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/order/views/';
		$this->message->section = 'order';
		$this->view->title = 'Заказ';
    }

    public function action_index()
	{
		$order = new Order($this->get->id_order);
		$order->getPositions()->convertProperties()->getProductsMain()->getActions();
		$this->render('index/main', compact('order'));
	}

	public function action_list()
	{
		$user = (new User)->setData($this->session->id_user)->setProperties();
		$orders = (new Order)->getForList();
		$this->setTitle('Заказы')->render('list/main', compact('orders'));
	}
	
	public function action_add()
    {
		if (!$this->post->save) return $this->setTitle('Добавить заказ')->render('add/main');
		$item = (new Order)->getBySymbol();
        if ($item) return $this->setMessage('error', 'exist')->redirect('order/index?id_order='.$item->id);
		$order = (new Order)->addData()->setActive()->setMessage('success', 'add');
		if ($this->post->type == Order::TYPE_CYLINDER) $this->redirect('order_position/add?id_order='.$order->id);
		else $this->redirect('order?id_order='.$order->id);
    }
	
	public function action_edit()
	{
		$order = new Order($this->get->id_order);
		if (!$this->post->save) return $this->render('edit/main', compact('order'));
		$order->edit()->setMessage('success', 'edit');
		$this->redirect('order?id_order='.$order->id);
	}
	
	public function action_edit_state()
	{
		$order = new Order($this->get->id_order);
		if (!$this->post->save) return $this->render('edit_state/main', compact('order'));
		$order->getProductsAll()->getActions()->getPositions()->editState()->setMessage('success', 'edit_state');
		$this->redirect('order?id_order='.$order->id);
	}
	
	public function action_delete()
	{
		$order = (new Order)->setData($this->get->id_order)->delete();
		$this->setMessage('success', 'delete')->redirect('order/list');
	}
	
	public function action_activate()
	{
		$this->setSession('id_order_active', $this->get->id_order);
		$this->redirectPrevious();
	}
	
	 public function action_search()
	 {
		 $orders = (new Order)->search();
		 if (count($orders) == 1) return $this->setMessage('success', 'found', 'order_search')->redirect('order?id_order='.$orders[0]->id);
		 else if (count($orders ) > 1) $this->setMessage('success', 'found_next', 'order_search')->render('search/main', compact('orders'));
		 else $this->setMessage('error', 'not_found', 'order_search')->redirectPrevious();
	 }
    

	
}