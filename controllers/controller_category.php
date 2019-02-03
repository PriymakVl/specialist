<?php
require_once('./core/controller.php');
require_once('./modules/category/models/category.php');


class Controller_Category extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/category/views/';
    }

    public function action_index()
	{
		$cat = new Category(Param::get('id_cat'));
		$cat->getProducts();
		//$states = OrderState::get($order->id);
        $this->view->title = 'Категория';
		$this->render('index/main', compact('cat'));
	}

//	public function action_list()
//	{
//	    $params = Param::forOrderList();
//		$orders = Order::getList($params);
//        $this->view->title = 'Заказы';
//		$this->render('list/main', compact('orders', 'params'));
//	}


	public function action_add()
    {
        $order = Order::getByNumber(Param::get('number'));
        if ($order) {
            Message::setSession('error', 'order', 'already_exist');
            $this->redirect('order/index?order_id='.$order->id);
        }
        else {
            $add_id = Order::add(Param::forAddOrder());
            Message::setSession('success', 'order', 'success_add');
            $this->redirect('order/list?&light_id='.$add_id.'&type='.Param::get('type'));
        }
    }

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