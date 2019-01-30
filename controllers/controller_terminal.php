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
        //if (isset($_COOKIE['username'])) $this->redirect('order/list');
		$orders = OrderStatic::getList(['state' => OrderState::WORK, 'status' => Order::STATUS_ACTIVE]);
        $this->render('terminal/orders', compact('orders'));
    }
	
	public function action_products()
    {
		$order = new Order(Param::get('id_order'));
		$products = OrderContent::getProducts($order->id);
        //if (isset($_COOKIE['username'])) $this->redirect('order/list');
        $this->render('terminal/products', compact('products', 'order'));
    }

    public function action_login()
    {
        // $password = Param::get('password');
        // $user = User::getByPassword($password);
        // if ($user) {
            // setcookie('username', $user->name);
            // $this->redirect('order/list');
        // }
        // else $this->redirect('terminal');
		$this->render('terminal/login');
    }

//    public function action_logout()
//    {
//        unset($_COOKIE['username']);
//        setcookie('username', "", time()-3600);
//        $this->redirect('main/login');
//    }

}