<?php

require_once('./core/controller.php');
require_once('./modules/order/models/order_static.php');
require_once('./modules/order/models/order_state.php');
require_once('./modules/order/models/order.php');

class Controller_Terminal extends Controller {
	
	public $worker;
	
    public function __construct()
    {
        parent::__construct();
        $this->view->pathLayout = './views/layouts/terminal.php';
		$this->view->title = 'Терминал';
    }
	
	private function getWorker() {
		$id_worker = Session::get('id_worker');
		if ($id_worker) return User::getWorker($id_worker);
        else $this->redirect('terminal/login');
	}

    public function action_orders()
    {
        $worker = $this->getWorker();
		$orders = OrderStatic::getList(['state' => OrderState::WORK, 'status' => Order::STATUS_ACTIVE]);
        $this->render('terminal/orders', compact('orders', 'worker'));
    }
	
	public function action_products()
    {
        $worker = $this->getWorker();
		$order = new Order(Param::get('id_order'));
		$products = OrderProducts::getForWorker($order, $worker);
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
	
	public function action_to_work()
	{
		$params = Param::terminalToWork();
		OrderProducts::toWork($params);
		$this->redirect('terminal/products?id_order='.$params['id_order']);
	}

//    public function action_logout()
//    {
//        unset($_COOKIE['username']);
//        setcookie('username', "", time()-3600);
//        $this->redirect('main/login');
//    }

}