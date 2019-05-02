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
		$orders = (new Order)->getForPlan();
		$this->render('orders/main', compact('orders'));
	}
	
	public function action_products()
	{
		$products = (new OrderProduct)->getForPlan();
		$this->render('products/main', compact('products'));
	}
	
	public function action_actions()
	{
		$actions = (new OrderAction)->getForPlan();
		$this->render('actions/main', compact('actions'));
	}
	
	public function action_workers()
	{
		$worker = $this->get->id_user ? (new Worker)->setData($this->get->id_user)->setProperties()->getActions()->calculateTimePlan() : false ; 
		$workers = (new Worker)->getWorkers();
		$this->render('workers/main', compact('worker', 'workers'));
	}
	
	public function action_edit_rating()
	{
		if ($this->get->id_prod) (new OrderProduct)->setData($this->get->id_prod)->getActions()->editRating()->setMessage('success', 'edit_rating')->setSession('id_prod_active', $this->get->id_prod);
		if ($this->get->id_order) (new Order)->setData($this->get->id_order)->editRating()->setMessage('success', 'edit_rating');
		if ($this->get->id_action) (new OrderAction)->setData($this->get->id_action)->setRating($this->get->rating)->setMessage('success', 'edit_rating')->setSession('id_action_active', $this->get->id_action);
		$this->redirectPrevious();
	}
	
	public function action_edit_state()
	{
		if ($this->get->id_order) (new Order)->setData($this->get->id_order)->getProductsMain()->getProductsAll()->editState()->setMessage('success', 'edit_state')->setSession('id_order_active', $this->get->id_order);
		else if ($this->get->id_prod) (new OrderProduct)->setData($this->get->id_prod)->editStateUpAndDown()->setMessage('success', 'edit_state')->setSession('id_prod_active', $this->get->id_prod);
		else if ($this->get->id_action) (new OrderAction)->setData($this->get->id_action)->editStateUp()->setMessage('success', 'edit_state')->setSession('id_action_active', $this->get->id_action);
		$this->redirectPrevious();
	}

}