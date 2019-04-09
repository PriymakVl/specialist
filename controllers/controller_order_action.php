<?php

class Controller_Order_Action extends Controller_Base {

	public function __construct()
    {
        parent::__construct();
		$this->view->title = 'Заказ';
        $this->view->pathFolder = './modules/order_action/views/';
		$this->message->section = 'order_action';
    }
	//add action from table actions product
	public function action_add_base()
	{
		$product = (new OrderProduct)->setData($this->get->id_prod)->getSpecificationAll();
		(new OrderAction)->addForProduct($product)->addForSpecification($product->specificationAll);
		$this->redirect('order?tab='.self::ORDER_TAB_PRODUCTS.'&id_order='.$product->id_order.'&id_active='.$product->id);
	}

	public function action_add_for_product()
	{
		$product = new OrderProduct($this->get->id_prod);
		if (!$this->post->save) return $this->render('add/main', compact('product'));
		$action = (new OrderAction)->addForProduct()->setMessage('success', 'add');
		if ($product) $this->redirect('order_product?id_prod='.$product->id);
	}
	
	public function action_edit_state()
	{
		$action = (new OrderAction)->setData($this->get->id_action)->getProperties();
		if ($this->post->save) return $this->render('edit_state/main', compact('action'));
		$action->editState()->setMessage('success', 'edit_state');
		// ->editTime($params)->checkReadyOrder()
		$this->redirect('order?tab='.self::ORDER_TAB_ACTIONS.'&id_order='.$action->id_order);
	}
	
	public function action_edit()
	{
		$action = (new OrderAction)->setData($this->get->id_action)->getProduct();
		if (!$this->post->save) return $this->render('edit/main', compact('action'));
		$action->edit()->setMessage('success', 'edit');
		// ->editTime($params)->checkReadyOrder()
		if ($this->get->sent == 'order') $this->redirect('order?tab='.self::ORDER_TAB_ACTIONS.'&id_order='.$action->id_order);
		else $this->redirect('order_product?id_prod='.$action->id_prod);
	}
	
	public function action_delete()
	{
		$action = (new OrderAction)->setData($this->get->id_action)->delete()->checkStateProduct()->setMessage('success', 'delete');
		if ($this->get->sent == 'order') $this->redirect('order?tab='.self::ORDER_TAB_ACTIONS.'&id_order='.$action->id_order);
		else $this->redirect('order_product?id_prod='.$action->id_prod);
	}
	
	
	public function action_state_list()
	{
		$params = ParamOrderAction::stateList();
		if ($params['type'] == 'plan') {
			$action = new OrderAction($params['id_action']); /***/ $action->getAllStates($params)->getProduct();
		} else {
			$action = new OrderActionUnplan($params['id_action']); /***/ $action->getAllStates($params);
		}
		return $this->render('states/main', compact('action', 'params'));
	}
	
	public function action_to_work()
	{
		$order = new Order($this->id_order);
		$order->toWork()->setState(OrderState::WORK)->setMessage('success', 'work');
		$this->redirectPrevious();
	}

	
}