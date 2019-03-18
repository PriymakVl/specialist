<?php

require_once('controller_base.php');

class Controller_Terminal extends Controller_Base
{

    public $worker;

    public function __construct()
    {
        parent::__construct();
        $this->view->pathLayout = './views/layouts/terminal.php';
        $this->view->pathFolder = './views/terminal/';
        $this->view->title = 'Терминал';
    }

    private function getWorker()
    {
        $id_worker = Session::get('id_user');
        if ($id_worker) return new Worker($id_worker);
        else $this->redirect('main/login');
    }

    public function action_actions()
    {
        $worker = $this->getWorker();
		$params = ParamTerminal::getActions($worker);
		if ($params['action'] == 'unplan') $actions = OrderActionUnplan::getActions();
        else $actions = OrderAction::getForTerminal($params);
        $this->render('actions/main', compact('actions', 'worker', 'params'));
    }

    public function action_start_work()
    {
        $params = ParamTerminal::startWork();
        if ($params['action'] == 'unplan') {
			$action = new OrderActionUnplan($params['id']); /***/ $action->startWork($params)->checkReadyOrder();
		} else {
			 $action = new OrderAction($params['id']); /***/ $action->startWork($params)->checkReadyOrder();
		}
        $this->redirect('terminal/actions?action='.$params['action']);
    }

    public function action_end_work()
    {
        $params = ParamTerminal::endWork();
		if ($params['action'] == 'unplan') {
			$action = new OrderActionUnplan($params['id']); $action->endWork($params)->checkReadyOrder();
		} else {
			$action = new OrderAction($params['id']); $action->endWork($params)->checkReadyOrder();
		}
        $this->redirect('terminal/actions?action='.$params['action']);
    }

    public function action_stop_work()
    {
        $params = ParamTerminal::stopWork();
		if ($params['action'] == 'unplan') {
			$action = new OrderActionUnplan($params['id']); $action->stopWork($params)->checkReadyOrder();	
		} else {
			$action = new OrderAction($params['id']); $action->stopWork($params)->checkReadyOrder();
		}
        $this->redirect('terminal/actions?action=' . $params['action']);
    }
	
	public function action_add_note()
	{
		$params = ParamTerminal::addNote();
		OrderAction::addNote($params);
		$this->redirect('terminal/actions?action=' . $params['action']);
	}
}