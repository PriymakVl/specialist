<?php
require_once('controller_base.php');

class Controller_Statistics extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/statistics/views/';
    }

    public function action_workers()
	{
		$workers = Worker::getAllWithStatistics();
        $this->view->title = 'Статистика по рабочим';
		$this->render('workers/main', compact('workers'));
	}
	
	public function action_worker()
	{
		$worker = new Worker(Param::get('id_worker'));
		$worker->getOrdersPlan();
		$this->view->title = 'Статистика по рабочему';
		$this->render('worker/main', compact('worker'));
	}
	
	public function action_order()
	{
		$order = new Order(Param::get('id_order'));
		$worker = new Worker(Param::get('id_worker'));
		$products = OrderProducts::getForWorker($order, $worker);
		$this->render('order/main', compact('worker', 'order', 'products'));
	}
	
}