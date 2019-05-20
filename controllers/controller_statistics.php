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
		// debug($workers[0]->timePlanMadeDivision);
		// debugProp($workers, 'timePlanMade');
		$this->render('workers/main', compact('workers'));
	}
	
	public function action_worker()
	{
		$worker = (new Worker)->setData($this->get->id_worker)->setProperties()->getActionsMade();
		// debug	Prop($worker->actionsFact, 'name');
		$this->render('worker/main', compact('worker'));
	}
	
}