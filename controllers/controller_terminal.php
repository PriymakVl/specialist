<?php

require_once('./core/controller.php');
require_once('./modules/order/models/order_static.php');
require_once('./modules/order/models/order_state.php');
require_once('./modules/order/models/order.php');

class Controller_Terminal extends Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->view->pathLayout = './views/layouts/terminal.php';
		$this->view->title = 'Терминал';
    }

    public function action_orders()
    {
        $id_worker = Session::get('id_worker');
		if ($id_worker) $worker = User::getWorker($id_worker);
        else $this->redirect('terminal/login');
		$orders = OrderStatic::getList(['state' => OrderState::WORK, 'status' => Order::STATUS_ACTIVE]);
        $this->render('terminal/orders', compact('orders', 'worker'));
    }
	
	public function action_products()
    {
        $id_worker = Session::get('id_worker');
		if ($id_worker) $worker = User::getWorker($id_worker);
        else $this->redirect('terminal/login');
		$order = new Order(Param::get('id_order'));
		$products = OrderProducts::get($order->id);
        $this->render('terminal/products', compact('products', 'order', 'worker'));
    }

    public function action_login()
    {
		if (Session::get('id_worker')) $this->redirect('/terminal/orders');
		$params = Param::getAll(['login', 'password']);
		if (!$params) $this->render('terminal/login');
		$user = UserStatic::authorisation($params);
        if ($user) {
            //setcookie('id_worker', $user->id);
			Session::set('id_worker', $user->id);
            $this->redirect('terminal/orders');
        }
		$this->render('terminal/login');
    }

//    public function action_logout()
//    {
//        unset($_COOKIE['username']);
//        setcookie('username', "", time()-3600);
//        $this->redirect('main/login');
//    }

}