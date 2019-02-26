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
        $order_actions = OrderAction::getForTerminal($params);
		$actions = Action::getAll('actions');
        $this->render('actions/main', compact('order_actions', 'worker', 'actions', 'params'));
    }

    public function action_start_work()
    {
        $params = ParamTerminal::startWork();
        OrderAction::startWork($params);
        $this->redirect('terminal/actions?id_action='.$params['id_action']);
    }

    public function action_end_work()
    {
        $params = ParamTerminal::endWork();
        OrderAction::endWork($params);
		$result = OrderAction::getNotReadyActionOrder(ParamTerminal::getNotReadyActionOrder());
		if (!$result) {
			$order = new Order(Param::get('id_order'));
			$order->setStateMade();
		}
        $this->redirect('terminal/actions?id_action='.$params['id_action']);
    }

    public function action_stop_work()
    {
        $params = ParamTerminal::stopWork();
        OrderAction::stopWork($params);
		$id_action = Param::get('actions') ? 'all' : $params['id_action'];//for return on page all actions;
        $this->redirect('terminal/actions?id_action=' . $id_action);
    }
}