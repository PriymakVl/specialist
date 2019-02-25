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
        $prod_actions = OrderAction::getForTerminal($params);
		$actions = Action::getAll('actions');
        $this->render('actions/main', compact('prod_actions', 'worker', 'actions', 'params'));
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
		$result = OrderProductAction::checkMadeOrder(ParamTerminal::checkMadeOrder());
		if ($result) {
			//$product = new OrderProduct($params['id_prod']);
			//$product->setStateMade();
			$order = new Order(Param::get('id_order'));
			$order->setStateMade();
		}
        //$worker = $this->getWorker();
        //$products = OrderProducts::getForWorker($worker);
        $this->redirect('terminal/actions?id_action='.$params['id_action']);
    }

    public function action_stop_work()
    {
        $params = ParamTerminal::stopWork();
        //OrderProducts::stopWork($params);
        $this->redirect('terminal/products?id_order=' . $params['id_order']);
    }
}