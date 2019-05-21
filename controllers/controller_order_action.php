<?php

class Controller_Order_Action extends Controller_Base {

	public function __construct()
    {
        parent::__construct();
		$this->view->title = 'Операция';
        $this->view->pathFolder = './modules/order_action/views/';
		$this->message->section = 'order_action';
    }
	//add action from table actions product
	public function action_add_base()
	{
		$product = (new OrderProduct)->setData($this->get->id_prod)->getSpecificationAll();
		(new OrderAction)->addForProductBase($product)->addForSpecification($product->specificationAll);
		(new Order)->setData($product->id_order)->setState(OrderState::PREPARATION);
		$this->redirect('order?tab='.self::ORDER_TAB_PRODUCTS.'&id_order='.$product->id_order.'&id_active='.$product->id);
	}

	public function action_add_for_product()
	{
		$product = new OrderProduct($this->get->id_prod);
		if (!$this->post->save) return $this->render('add/main', compact('product'));
		$action = (new OrderAction)->addForProduct()->setMessage('success', 'add');
		$this->redirect('order_product?id_prod='.$product->id);
	}
	
	public function action_add_for_order()
	{
		$order = new Order($this->get->id_order); $product = false;
		if (!$this->post->save) return $this->render('add/main', compact('order'));
		$action = (new OrderAction)->addForOrder()->setMessage('success', 'add');
		$this->redirect('order?tab='.self::ORDER_TAB_ACTIONS.'&id_order='.$order->id);
	}
	//add without order and product
	public function action_add_for_other()
	{
		if (!$this->post->save) return $this->render('add/main');
		$action = (new OrderAction)->addForOther()->setMessage('success', 'add');
		$this->redirect('plan/actions?type_order='.$this->get->type_order.'&id_active='.$action->id);
	}
	
	public function action_edit_state()
	{
		$action = (new OrderAction)->setData($this->get->id_action)->getProperties();
		if ($this->post->save) return $this->render('edit_state/main', compact('action'));
		$action->editState()->setMessage('success', 'edit_state');
		// ->editTime($params)->checkReadyOrder()
		$this->redirect('order?tab='.self::ORDER_TAB_ACTIONS.'&id_order='.$action->id_order);
	}
	
	public function action_edit_state_group()
	{
		if (!$this->post->save) return $this->render('edit_state/main');
		if (!$this->post->state) return $this->setMessage('error', 'not_state', 'order_action')->redirectPrevious();
		(new OrderAction)->editStateGroup();
		$this->setMessage('success', 'edit_state', 'order_action')->redirect('order?tab='.self::ORDER_TAB_ACTIONS.'&id_order='.$this->post->id_order);
	}
	
	public function action_edit()
	{
		$action = (new OrderAction)->setData($this->get->id_action)->getProduct()->getOrder();
		if (!$this->post->save) return $this->render('edit/main', compact('action'));
		$action->edit()->setMessage('success', 'edit');
		if ($this->get->sent == 'order') $this->redirect('order?tab='.self::ORDER_TAB_ACTIONS.'&id_order='.$action->id_order);
		else if ($this->get->sent == 'product') $this->redirect('order_product?id_prod='.$action->id_prod);
		else $this->redirect('plan/actions?id_active='.$action->id);
	}
	
	public function action_delete()
	{
		$action = (new OrderAction)->setData($this->get->id_action)->delete()->setMessage('success', 'delete');
		if ($this->get->sent == 'order') $this->redirect('order?tab='.self::ORDER_TAB_ACTIONS.'&id_order='.$action->id_order);
		else if ($this->get->sent == 'product') $this->redirect('order_product?id_prod='.$action->id_prod);
		else $this->redirectPrevious();
	}
	
	
	public function action_state_list()
	{
		$action = (new OrderAction)->setData($this->get->id_action)->getStates()->getProduct()->getOrder();
		return $this->render('states/main', compact('action'));
	}
	
	public function action_add_worker()
	{
		$action = (new OrderAction)->setData($this->get->id_action)->getWorker();
		$workers = (new Worker)->getWorkers(true);
		if (!$this->post->save) return $this->render('add_worker/main', compact('action', 'workers'));
		$action->addWorker()->setMessage('success', 'add_worker');
		return $this->redirect('plan/actions?id_active='.$action->id.'&type_order='.$this->get->type_order);
	}
	
}