<?php

class Controller_Statistics extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
		 $this->view->title = 'Статистика';
        $this->view->pathFolder = './modules/statistics/views/';
    }

    public function action_workers()
	{
		$workers = (new Worker)->getWorkersForStatistics();
		$this->render('workers/main', compact('workers'));
	}
	
	public function action_worker()
	{
		$worker = (new Worker)->setData($this->get->id_worker)->setProperties()->getActionsMade()->getTimeFact()->calculateCost();
		$this->render('worker/main', compact('worker'));
	}
	
	public function action_save_file()
	{
		$worker = (new Worker)->setData($this->get->id_worker)->setProperties()->getActionsMade()->getTimeFact()->calculateCost();
		if (!$worker->actionsMade) return $this->setMessage('error', 'not-data-file', 'statistics')->redirectPrevious();
		$excel = new StatisticsWorkerExcel($worker);
		$excel->period = (object) ['end' => $this->get->period_end, 'start' => $this->get->period_start];
		return $excel->setActionName($this->get->action)->bildSheet()->uploadFile('statistics.xls');
	}

	public function action_product()
	{
		$product = (new OrderProduct)->setData($this->get->id_order_prod)->getOrder()->getActions()->calculateTimeActions();
		$this->render('product/main', compact('product'));
	}
	
}