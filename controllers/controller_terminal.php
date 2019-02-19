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

    public function action_products()
    {
        $worker = $this->getWorker();
        $products = OrderProducts::getForWorker($worker);
        $this->render('products/main', compact('products', 'worker'));
    }

    public function action_start_work()
    {
        $params = ParamTerminal::startWork();
        OrderProducts::startWork($params);
        $this->redirect('terminal/products');
    }

    public function action_end_work()
    {
        $params = ParamTerminal::endWork();
        OrderProducts::endWork($params);
        $order = new Order(Param::get('id_order'));
        $order->setStateMade();

        //$worker = $this->getWorker();
        //$products = OrderProducts::getForWorker($worker);
        $this->redirect('terminal/products');
    }

    public function action_stop_work()
    {
        $params = ParamTerminal::stopWork();
        OrderProducts::stopWork($params);
        $this->redirect('terminal/products?id_order=' . $params['id_order']);
    }
}