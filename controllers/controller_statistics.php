<?php
require_once('./core/controller.php');
require_once('./modules/statistics/models/statistics.php');


class Controller_Statistics extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/statistisc/views/';
    }

    public function action_workers()
	{
		$workers = User::getWorkers();
		debug($workers);
        $this->view->title = 'Статистика по рабочим';
		$this->render('workes/main', compact('workers'));
	}
	
}