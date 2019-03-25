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
		$order->getPositions()->getProducts()->convertState()->getActions()->getActionsUnplan()->convertRating();
		$this->render('index/main', compact('order'));
	}

	public function action_list()
	{
		$user = (new User)->getData($this->session->id_user)->getOptions()->getDefaultStateOrders();
		$state = $this->get->state ? $this->get->state : $user->defaultStateOrders;
		$orders = Order::getList($state);
		$this->setTitle('Заказы')->render('list/main', compact('orders', 'state'));
	}
	
	public function action_to_made()
	{
		$order = new Order($this->id_order);
		$order->toMade()->setState(OrderState::MADE)->setMessage('success', 'made');
		$this->redirectPrevious();
	}
	
	public function action_add()
    {
		if (!$this->post->save) return $this->setTitle('Добавить заказ')->render('add/main');
        $order = Order::getBySymbol($this->post->symbol);
        if ($order) return $this->setMessage('error', 'exist')->redirect('order/index?id_order='.$order->id);
		$order = (new Order)->addData()->setActive();
		$this->setMessage('success', 'add')->redirect('order_position/add?id_order='.$order->id);
    }
	
	public function action_edit()
	{
		$order = new Order($this->id_order);
		if (!$this->post->save) return $this->render('edit/main', compact('order'));
		$order->edit($params)->setMessage('success', 'edit')->checkReady();
		$this->redirect('order?id_order='.$this->id_order);
	}
	
	public function action_delete()
	{
		$order = (new Order)->getData($this->get->id_order)->deleteStatic();
		$this->setMessage('success', 'delete')->redirect('order/list');
	}
	
	 public function action_search()
	 {
		 $items = Order::searchBySymbol();

		 if (count($items) == 1) return $this->setMessage('success', 'found', 'order_search')->redirect('order?id_order='.$items[0]->id);
		 else if (count($orders ) > 1) {
			$orders = ObjectHelper::createArray($items, 'Order', 'setData');
			$this->setMessage('success', 'found_next', 'order_search')->render('search/main', compact('orders'));
		 } 
		 else $this->message->set('error', 'not_found')->redirectPrevious();
	 }
    

	
}