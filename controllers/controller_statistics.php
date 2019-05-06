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
		$workers = (new Worker)->getWorkers();
		$this->render('workers/main', compact('workers'));
	}
	
	public function action_worker()
	{
		$worker = (new Worker)->setData($this->get->id_worker)->getActionsFact();
		debugProp($worker->actionsFact, 'timeMade');
		$this->render('worker/main', compact('worker'));
	}
	
}