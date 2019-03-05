<?php
require_once('controller_base.php');

class Controller_Order_Action extends Controller_Base {

	public function __construct()
    {
        parent::__construct();
		$this->view->title = 'Заказ';
        $this->view->pathFolder = './modules/order/views/';
		$this->message->section = 'order_action';
    }
	
	public function action_edit()
	{
		$params = ParamOrderAction::edit();
		$action = new OrderAction($params['id_action']);
		if (empty($params['save'])) return $this->render('action/edit/main', compact('action'));
		OrderAction::edit($params);
		$this->message->set('success', 'edit');
		Order::checkReady();
		$this->redirect('order?id_order='.$action->id_order);
	}
	
/* 	public function action_edit_unplan()
	{
		$params = ParamOrderActionUnplan::edit();
		$action = new OrderActionUnplan($params['id_action_unplan']);
		if (empty($params['save'])) return $this->render('action/edit_unplan/main', compact('action'));
		OrderAction::edit($params);
		$this->message->set('success', 'edit');
		Order::checkReady();
		$this->redirect('order?id_order='.$action->id_order);
	} */
	
	public function action_delete()
	{
		$id_action = Param::get('id_action');
		if ($id_aciton) $action = new OrderAction($id_action);
		else $action = new OrderActionUnplan(Param::get('id_action_unplan'));
		$action->delete();
		$this->message->set('success', 'delete');
		$this->redirectPrevious();
	}
	
	public function action_add_unplan()
	{
		$params = ParamOrderActionUnplan::add();
		$order = new Order($params['id_order']);
		$order->getProducts();
		$actions = Action::getAll('actions');
		if (empty($params['save'])) return $this->render('action/add_unplan/main', compact('order', 'actions'));
		OrderActionUnplan::add($params);
		$this->message->set('success', 'add_unplan');
		$this->redirect('order?id_order='.$order->id);
	}
	
	public function action_state()
	{
		$params = ParamOrderAction::state();
		if ($params['type'] == 'plan'] {
			$action = new OrderAction($params['id_action']); /**/ $action->getWorker()->getStates($params);
			return $this->render('action/state/plan/main', $action);
		} else {
			$action = new OrderActionUnplan($params['id_action']); /**/ $action->getWorker()->getStates($params);
			return $this->render('action/state/unplan/main', $action);
		}
	}

	
}