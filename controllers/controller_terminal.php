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
        $this->view->pathFolder = './views/terminal/';
		$this->view->title = 'Терминал';
    }
	
	private function getWorker() {
		$id_worker = Session::get('id_worker');
		if ($id_worker) return new Worker($id_worker);
        else $this->redirect('terminal/login');
	}

    public function action_orders()
    {
        $worker = $this->getWorker();
		$orders = OrderStatic::getForWorker($worker);
        $this->render('orders/main', compact('orders', 'worker'));
    }
	
	public function action_products()
    {
		$worker = $this->getWorker();
		$order = new Order(Param::get('id_order'));
        $products = OrderProducts::getForWorker($order, $worker);
		if ($products) $this->render('products/main', compact('products', 'order', 'worker'));
		else $this->redirect('terminal/orders');
    }

    public function action_login()
    {
		if (Session::get('id_worker')) $this->redirect('terminal/orders');
		$params = Param::getAll(['login', 'password']);
		if ($params) $user = UserStatic::authorisation($params);
		else $user = false;
        if ($user) {
			Session::set('id_worker', $user->id);
            $this->redirect('terminal/orders');
        }
		$this->render('login');
    }
	
	public function action_start_work()
	{
		$params = Param::terminalStartWork();
		OrderProducts::startWork($params);
		$this->redirect('terminal/products?id_order='.$params['id_order']);
	}
	
	public function action_end_work()
	{
		$params = Param::terminalEndWork();
		OrderProducts::endWork($params);
		$order = new Order(Param::get('id_order'));
		
		$ready_order = $order->checkReadiness();//если последняя деталь изменить статус заказа
		if ($ready_order) $order->setState(OrderState::MADE);//установить статус заказа выполнен
		
		$worker = $this->getWorker();
        $products = OrderProducts::getForWorker($order, $worker);
		
		if ($products) $this->redirect('terminal/products?id_order='.$params['id_order']);
		else $this->redirect('terminal/orders');
	}
	
	public function action_stop_work()
	{
		$params = Param::terminalStopWork();
		OrderProducts::stopWork($params);
		$this->redirect('terminal/products?id_order='.$params['id_order']);
	}

    public function action_logout()
    {
        Session::delete('id_worker');
        $this->redirect('terminal/login');
    }

}