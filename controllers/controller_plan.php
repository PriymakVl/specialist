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
		$products = (new OrderProduct)->getListForPlan();
		$this->render('products/main', compact('products'));
	}
	
	public function action_actions()
	{
		$actions = (new OrderAction)->getListForPlan();
		$this->render('actions/main', compact('actions'));
	}
	
	public function action_edit_rating()
	{
		if ($this->get->id_prod) (new OrderProduct)->setData($this->get->id_prod)->editRating()->setMessage('success', 'edit_rating');
		if ($this->get->id_order) (new Order)->setData($this->get->id_order)->editRating($this->get->rating)->setMessage('success', 'edit_rating');
		if ($this->get->id_action) (new OrderProduct)->setData($this->get->id_action)->setRating($this->get->rating)->setMessage('success', 'edit_rating');
		$this->redirectPrevious();
	}

}