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
	
	public function action_delete()
	{
		$action = new OrderAction(Param::get('id_action'));
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

	
}