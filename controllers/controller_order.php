<?php
require_once('controller_base.php');

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
		debug($this->get->id_order);
		$order = new Order($this->get->id_order);
		debug('ddd');
		$order->getData()->getPositions()->getContent()->convertState()->getActions()->getActionsUnplan()->convertRating();
		debug($order);
		$this->render('index/main', compact('order'));
	}

	public function action_list()
	{
		$orders = Order::getList();
        $this->view->title = 'Заказы';
		$this->render('list/main', compact('orders'));
	}
	
	public function action_activate()
    {
        Session::set('order-active', $this->id_order);
        $this->redirectPrevious();
    }
	//добавление деталей в заказ в ручную
	public function action_add_content()
	{
		$id_order = Session::get('order-active');
		if (empty($id_order)) {
			$this->message->set('error', 'not-active'); 
			$this->redirectPrevious();
		}
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
	
	public function action_to_work()
	{
		$order = new Order($this->id_order);
		$order->toWork()->setState(OrderState::WORK)->setMessage('success', 'work');
		$this->redirectPrevious();
	}
	
	public function action_to_made()
	{
		$order = new Order($this->id_order);
		$order->toMade()->setState(OrderState::MADE)->setMessage('success', 'made');
		$this->redirectPrevious();
	}
	
	public function action_add()
    {
        $this->view->title = 'Добавить заказ';
		$params = ParamOrder::add();
		if (empty($params['save'])) return $this->render('add/main');
        $order = Order::getBySymbol($params['symbol']);
        if ($order) {
            $this->message->set('error', 'exist');
            $this->redirect('order/index?id_order='.$order->id);
        }
        else {
            $id_add = Order::add($params);
            Session::set('order-active', $id_add);
            $this->message->set('success', 'add');
            $this->redirect('order/add_position?id_order='.$id_add);
        }
    }
	
	public function action_edit()
	{
		$params = ParamOrder::edit();
		$order = new Order($this->id_order);
		if (empty($params['save'])) return $this->render('edit/main', compact('order'));
		$order->edit($params)->setMessage('success', 'edit')->checkReady();
		$this->redirect('order?id_order='.$this->id_order);
	}
	
	public function action_change_qty_product()
	{
		$params = ParamOrder::changeQtyProduct();
		OrderContent::changeQuantity($params);
		$this->message->set('success', 'edit_qty');
		$this->redirectPrevious();
	}
	
	public function action_delete()
	{
		$order = new Order($this->id_order);
		$order->delete();
		$this->redirect('order/list');
	}
	
	public function action_add_position()
	{
		$params = ParamOrder::addPosition();
		$order = new Order($this->id_order);
		if (empty($params['symbol'])) return $this->render('position/add', ['order' => $order]);
		OrderPositions::add($params);
		$this->redirect('order?id_order='.$this->id_order);
	}
	
	public function action_delete_position()
	{
		(new OrderPosition)->delete()->setMessage('success', 'delete');
		$this->redirect('order?tab=1&id_order='.$this->id_order);
	}
	
	public function action_delete_content()
	{
		$ids = Param::getIds('ids');
		OrderContent::deleteAll($this->id_order, $ids);
		$this->redirect('order?id_order='.$this->id_order);
	}
	
	 public function action_search()
	 {
		 $orders = Order::searchBySymbol(Param::get('symbol'));

		 if (count($orders) == 1) {
			 $this->message->set('success', 'found');
			 return $this->redirect('order?id_order='.$orders[0]->id);
		 }
		 else if (count($orders ) > 1) {
			$orders = Order::createArrayOfOrder($orders);
			$this->message->set('success', 'found_next');
			return $this->render('search/main', compact('orders'));
		 } 
		 else {
			 $this->message->set('error', 'not_found');
			 $this->redirectPrevious();
		 }
	 }
    

	
}