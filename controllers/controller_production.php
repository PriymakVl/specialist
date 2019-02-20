<?php
require_once('controller_base.php');
//production time
class Controller_Production extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/production/views/';
    }

    public function action_workers()
	{
		$workers = Worker::getAllWithStatistics();
        $this->view->title = 'Статистика по рабочим';
		$this->render('workers/main', compact('workers'));
	}
	
	
}