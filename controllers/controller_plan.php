<?php

class Controller_Plan extends Controller_Base {


    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/plan/views/';
		$this->message->section = 'plan';
		$this->view->title = 'Планирование работ';
    }
	
	public function action_orders()
	{
		$this->get->state = OrderState::WORK;
		$orders = (new Order)->getListForPlan();
		debug($orders);
		$this->render('orders/main', compact('orders'));
	}

}