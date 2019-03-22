<?php
require_once('controller_base.php');

class Controller_Order_Position extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/order_position/views/';
		$this->message->section = 'order_position';
		$this->view->title = 'Позиция заказа';
    }
	
	public function action_add()
	{
		$order = new Order($this->get->id_order);
		if (!$this->post->save) return $this->render('add/main', ['order' => $order]);
		$position = (new OrderPosition)->addData()->setMessage('success', 'add');
		$this->redirect('order?tab=1&id_order='.$order->id);
	}
	
	public function action_delete()
	{
		$position = (new OrderPosition)->getData()->delete()->setMessage('success', 'delete');
		$this->redirect('order?tab=1&id_order='.$position->id_order);
	}
	
	public function action_edit()
	{
		$position = (new OrderPosition)->getData();
		$order = new Order($position->id_order);
		if (empty($position->params->save)) return $this->render('edit/main', compact('position', 'order'));
		$position->editData()->setMessage('success', 'edit');
		$this->redirect('order?tab=1&id_order='.$position->id_order);
	}
	
}