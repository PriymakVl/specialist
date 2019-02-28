<?php
require_once('controller_base.php');

class Controller_Order_Action extends Controller_Base {

	public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/order/views/';
    }
	
	public function action_edit()
	{
		$params = ParamOrderAction::edit();
		$action = new OrderAction($params['id_action']);
		if (empty($params['save'])) return $this->render('action/edit/main', compact('action'));
		OrderAction::edit($params);
		$this->redirect('order?id_order='.$action->id_order);
	}
	
	public function action_delete()
	{
		$action = new OrderAction(Param::get('id_action'));
		$action->delete();
		$this->redirectPrevious();
	}

	
}