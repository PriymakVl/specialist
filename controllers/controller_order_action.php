<?php

class Controller_Order_Action extends Controller_Base {

	public function __construct()
    {
        parent::__construct();
		$this->view->title = 'Заказ';
        $this->view->pathFolder = './modules/order_action/views/';
		$this->message->section = 'order_action';
    }
	
	public function action_add_product()
	{
		$product = (new OrderProduct)->setData($this->get->id_prod)->getOptions()->getSpecificationAll();
		(new OrderAction)->addForProduct($product)->addForSpecification($product->specificationAll);
		$this->redirect('order?tab='.self::ORDER_TAB_PRODUCTS.'&id_order='.$product->id_order.'&id_active='.$product->id);
	}
	
	public function action_edit_state()
	{
		$params = ParamOrderAction::editState();
		$action = new OrderAction($params['id_action']);
		if (empty($params['save'])) return $this->render('edit_state/main', compact('action'));
		$action->editState($params)->editTime($params)->setMessage('success', 'edit_state')->checkReadyOrder();
		$this->redirect('order?id_order='.$action->id_order);
	}
	
	public function action_delete()
	{
		$id_action = Param::get('id_action');
		if ($id_action) $action = new OrderAction($id_action);
		else $action = new OrderActionUnplan(Param::get('id_action_unplan'));
		$action->remove()->setMessage('success', 'delete')->checkReadyOrder();
		$this->redirectPrevious();
	}
	
	public function action_add_unplan()
	{
		$params = ParamOrderActionUnplan::add();
		$order = new Order($params['id_order']); /***/ $order->getProducts();
		$actions = DataAction::getAll('data_actions');
		if (empty($params['save'])) return $this->render('add_unplan/main', compact('order', 'actions'));
		OrderActionUnplan::add($params);
		$this->message->set('success', 'add_unplan');
		$order->checkReady();
		$this->redirect('order?tab=4&id_order='.$order->id);
	}
	
	public function action_edit_unplan()
	{
		$params = ParamOrderActionUnplan::edit();
		$order = new Order($params['id_order']);
		$action = new OrderActionUnplan($params['id_action']);
		if (empty($params['save'])) return $this->render('edit_unplan/main', compact('action', 'order'));
		$action->edit($params)->setMessage('success', 'edit')->checkReadyOrder();
		$this->redirect('order?tab=4&id_order='.$order->id);
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