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
	{
		$order = new Order($this->id_order);
		$order->getContent();
        $this->view->title = 'Заказ';
		$this->render('index/main', compact('order'));
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
		$params = Param::forAddOrder();
        $order = Order::getBySymbol($params['symbol']);
        if ($order) {
            //Message::setSession('error', 'order', 'already_exist');
            $this->redirect('order/index?order_id='.$order->id);
        }
        else {
            $id_add = Order::add($params);
            //Message::setSession('success', 'order', 'success_add');
            $this->redirect('order/list?state='.OrderState::REGISTERED);
        }
    }
	
	
	
	/* ниже методы от старого контроллера */

    public function action_delete()
    {
        $type = Param::get('type');
        $ids = Param::getIds('ids');
        foreach ($ids as $id) {
            $order = new Order($id);
            $order->delete();
        }
        Message::setSession('success', 'order', 'success_delete');
        $this->redirect('order/list?type='.$type);
    }
    
//    public function action_state()
//    {
//        $ids = Param::getIds('ids');
//        foreach ($ids as $id) {
//            $order = new Order($id);
//            $order->setState(Param::get('state'));
//        }
//        $this->redirect('order/list');
//    }


//    public function action_kind()
//    {
//        $kind = Param::get('kind');
//        $type = Param::get('type');
//        $ids = Param::getIds('ids');
//        foreach ($ids as $id) {
//            $order = new Order($id);
//            $order->setKind($kind);
//        }
//        $this->redirect('order/list?type='.$type);
//    }

//    public function action_search()
//    {
//        $search = Param::get('search');
//        $number = Param::get('number');
//        if ($search == 'order') $orders = Order::searchByNumber($number);
//        else $orders = Progon::searchOrderByNumber($number);
//        if (empty($orders)) {
//            Message::setSession('error', 'order', 'search_not_found');
//            $this->redirect('order/list');
//        }
//        else {
//            Message::setSession('success', 'order', 'search_found');
//            if (count($orders) == 1) $this->redirect('order/index?order_id='.$orders[0]->id);
//            else $this->render('order/search/main', compact('orders'));
//        }
//    }

//    public function action_update()
//    {
//        $order = new Order(Param::get('order_id'));
//        if (Param::get('update')) {
//            $order->update();
//            Message::setSession('success', 'order', 'update_success');
//            if (Param::get('type') == Order::TYPE_GLASS) $this->redirect('order/list?type='.Param::get('type').'&light_id='.$order->id);
//            $this->redirect('order/list?light_id='.$order->id);
//        }
//        $this->render('order/update/main', compact('order'));
//    }



//    public function action_highlight()
//    {
//        $orders = Order::getHighlightPreparation();
//        $title = 'Выделенные заказы';
//        $this->render('order/list/main', compact('orders', 'title'));
//    }
	
}