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
		$operations = Operation::getAll('operations');
        $this->render('actions/main', compact('actions', 'worker', 'operations', 'params'));
    }

    public function action_start_work()
    {
        $params = ParamTerminal::startWork();
        debug($params);
        if ($params['action'] == 'unplan') {
			$action = new OrderActionUnplan($params['id']); /***/ $action->startWork($params);
		} else {
			 $action = new OrderAction($params['id']); /***/ $action->startWork($params);
		}
        $this->redirect('terminal/actions?action='.$params['action']);
    }

    public function action_end_work()
    {
        $params = ParamTerminal::endWork();
		if ($params['action'] == 'unplan') {
			$action = new OrderActionUnplan($params['id']); $action->endWork($params);
		} else {
			$action = new OrderAction($params['id']); $action->endWork($params);
		}
		Order::checkReady();
        $this->redirect('terminal/actions?action='.$params['action']);
    }

    public function action_stop_work()
    {
        $params = ParamTerminal::stopWork();
		if ($params['action'] == 'unplan') {
			$action = new OrderActionUnplan($params['id']); $action->stopWork($params);	
		} else {
			$action = new OrderAction($params['id']); $action->stopWork($params);
		}
        $this->redirect('terminal/actions?action=' . $params['action']);
    }
}