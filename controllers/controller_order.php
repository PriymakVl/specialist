<?php
require_once('./core/controller.php');
require_once('./modules/order/models/order.php');
require_once('./modules/order/models/order_content.php');

class Controller_Order extends Controller {
	
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
	    $params = Param::forOrderList();
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
		$params = Param::addOrder();
		if (empty($params['symbol'])) return $this->render('add/main');
        $order = Order::getBySymbol($params['symbol']);
        if ($order) {
            //Message::setSession('error', 'order', 'already_exist');
            $this->redirect('order/index?order_id='.$order->id);
        }
        else {
            $id_add = Order::add($params);
            //Message::setSession('success', 'order', 'success_add');
            $this->redirect('order/list');
        }
    }
	
	public function action_edit()
	{
		$params = Param::editOrder();
		$order = new Order($this->id_order);
		if (empty($params['symbol'])) return $this->render('edit/main', compact('order'));
		Order::edit($params);
		$this->redirect('order?id_order='.$this->id_order);
	}
	
	public function action_change_qty_product()
	{
		$params = Param::changeQtyProductOrder();
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
		$params = Param::addOrderPosition();
		if (empty($params['symbol'])) return $this->render('position/add', ['id_order' => $this->id_order]);
		OrderPositions::add($params);
		$this->redirect('order?id_order='.$this->id_order);
	}
    

	
}