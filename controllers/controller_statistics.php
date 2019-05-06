<?php

class Controller_Statistics extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/statistics/views/';
    }

    public function action_workers()
	{
		$workers = (new Worker)->getWorkers();
        $this->view->title = 'Статистика по рабочим';
		$this->render('workers/main', compact('workers'));
	}
	
	public function action_worker_made()
	{
		$params = ParamWorker::made();
		$worker = new Worker($params['id_worker']);
		$worker->getActionsMade($params)->countTotalTimeForPeriod()->costMade();
		$this->view->title = 'Статистика по рабочему';
		$this->render('worker/main', compact('worker', 'params'));
	}
	
	public function action_worker_plan()
	{
		$worker = new Worker(Param::get('id_worker'));
		$params = ParamWorker::plan($worker->login);
		$worker->getActionsPlan($params);
		$this->view->title = 'Статистика по рабочему';
		$this->render('worker/main', compact('worker', 'params'));
	}
	
	public function action_order()
	{
		$order = new Order(Param::get('id_order'));
		$worker = new Worker(Param::get('id_worker'));
		$products = OrderProducts::getForWorker($order, $worker);
		$this->render('order/main', compact('worker', 'order', 'products'));
	}
	
}