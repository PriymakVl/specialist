<?php
require_once('./core/controller.php');
require_once('./modules/statistics/models/statistics.php');


class Controller_Statistics extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/statistics/views/';
    }

    public function action_workers()
	{
		$workers = User::getWorkers();
        $this->view->title = 'Статистика по рабочим';
		$this->render('workers/main', compact('workers'));
	}
	
}