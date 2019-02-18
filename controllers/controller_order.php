<?php
require_once('controller_base.php');

class Controller_Order extends Controller_Base {
	
	private $id_order;

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/order/views/';
		$this->id_order = Param::get('id_order');
    }

    public function action_index()
	{;
		$id_active = Session::get('order-active');
		$order = new Order($this->id_order);
		$order->getPositions()->getContent()->convertState();
        $this->view->title = 'Заказ';
		$this->render('index/main', compact('order', 'id_active'));
	}

	public function action_list()
	{
		$id_active = Session::get('order-active');
	    $params = ParamOrder::getList();
		$orders = Order::getList($params);
        $this->view->title = 'Заказы';
		$this->render('list/main', compact('orders', 'params', 'id_active'));
	}
	
	public function action_activate()
    {
        Session::set('order-active', $this->id_order);
        $this->redirectPrevious();
    }
	
	public function action_add_content()
	{
		$id_order = Session::get('order-active');
		if (!$id_order) exit('нет активного заказа');
		$id_prod = (Param::get('id_prod'));
		OrderContent::add($id_order, $id_prod);
		$this->redirect('order?id_order='.$id_order);
	}
	
	public function action_to_work()
	{
		$order = new Order($this->id_order);
		if ($order->state > OrderState::PREPARATION) exit('уже выдано');
		$order->toWork();
		$this->redirectPrevious();
	}
	
	public function action_add()
    {
        $this->view->title = 'Добавить заказ';
		$params = ParamOrder::add();
		if (empty($params['symbol'])) return $this->render('add/main');
        $order = Order::getBySymbol($params['symbol']);
        if ($order) {
            //Message::setSession('error', 'order', 'already_exist');
            $this->redirect('order/index?order_id='.$order->id);
        }
        else {
            $id_add = Order::add($params);
            Session::set('order-active', $id_add);
            //Message::setSession('success', 'order', 'success_add');
            $this->redirect('order/add_position?id_order='.$id_add);
        }
    }
	
	public function action_edit()
	{
		$params = ParamOrder::edit();
		$order = new Order($this->id_order);
		if (empty($params['symbol'])) return $this->render('edit/main', compact('order'));
		Order::edit($params);
		$this->redirect('order?id_order='.$this->id_order);
	}
	
	public function action_change_qty_product()
	{
		$params = ParamOrder::changeQtyProduct();
		OrderContent::changeQuantity($params);
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
	
	public function action_delete_content()
	{
		$ids = Param::getIds('ids');
		OrderContent::deleteAll($this->id_order, $ids);
		$this->redirect('order?id_order='.$this->id_order);
	}
    

	
}