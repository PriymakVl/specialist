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
		$orders = (new Order)->getListForPlan();
		$this->render('orders/main', compact('orders'));
	}
	
	public function action_edit_state_order()
	{
		(new Order)->setData($this->get->id_order)->getProducts()->getActions()->editState()->setMessage('success', 'edit_state');
		$this->redirect('plan/orders?type='.$this->get->type);
	}
	
	public function action_products()
	{
		$products = (new OrderProduct)->getAllNotStateEnded();
		$this->render('products/main', compact('products'));
	}
	
	public function action_actions()
	{
		$actions = (new OrderAction)->getAllNotStateEnded();
		$this->render('actions/main', compact('actions'));
	}
	
	public function action_edit_rating()
	{
		if ($this->get->id_prod) (new OrderProduct)->setData($this->get->id_prod)->editRating()->setMessage('success', 'edit_rating')->setSession('id_prod_active', $this->get->id_prod);
		if ($this->get->id_order) (new Order)->setData($this->get->id_order)->editRating()->setMessage('success', 'edit_rating');
		if ($this->get->id_action) (new OrderAction)->setData($this->get->id_action)->setRating($this->get->rating)->setMessage('success', 'edit_rating')->setSession('id_action_active', $this->get->id_action);
		$this->redirectPrevious();
	}
	
	public function action_edit_state()
	{
		if ($this->get->id_order) (new Order)->setData($this->get->id_order)->getProducts()->getActions()->editState()->setMessage('success', 'edit_state')->setSession('id_order_active', $this->get->id_order);
		if ($this->get->id_acton) (new OrderAction)->setData($this->get->id_action)->setState($this->get->state)->setMessage('success', 'edit_state')->setSession('id_action_active', $this->get->id_action);
		if ($this->get->id_prod) (new OrderProduct)->setData($this->get->id_prod)->getActions()->editState()->setMessage('success', 'edit_state')->setSession('id_prod_active', $this->get->id_prod);
		$this->redirectPrevious();
	}

}