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

    public function action_actions()
    {
		$worker = $this->getWorker();
		$params = ParamTerminal::getActions($worker);
		$actions = OrderAction::getForTerminal($params);
        $this->render('actions/main', compact('actions', 'worker', 'params'));
    }
	
	public function action_actions_unplan()
	{
		$worker = $this->getWorker();
		$params = ParamTerminal::getActionsUnplan($worker);
		$actions = OrderActionUnplan::getActions();
		$this->render('actions/main', compact('actions', 'worker', 'params'));
	}

    public function action_edit_state()
    {
        $params = ParamTerminal::editState();
		$action = new OrderAction($params['id_action']);
		$action->editState($params)->checkReadyOrder();
        $this->redirect('terminal/actions?action='.$params['action']);
    }
	
	public function action_edit_state_unplan()
	{
		$params = ParamTerminal::editStateUnplan();
		$action = new OrderActionUnplan($params['id_action']);
		$action->editState($params)->checkReadyOrder();
		$this->redirect('terminal/actions?action=unplan');
	}
	
	public function action_add_note()
	{
		$params = ParamTerminal::addNote();
		OrderAction::addNote($params);
		$this->redirect('terminal/actions?action=' . $params['action']);
	}
	
	private function getWorker()
    {
        $id_worker = Session::get('id_user');
        if ($id_worker) return new Worker($id_worker);
        else $this->redirect('main/login');
    }
}