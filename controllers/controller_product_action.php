<?php

class Controller_Product_Action extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/product_action/views/';
		$this->view->title = 'Операции';
		$this->message->section = 'product_action';
    }

    public function action_add()
	{
		if (!$this->post->save) return $this->render('add/main');
		(new ProductAction)->addData()->setMessage('success', 'add');
		$this->redirect('product?tab='.self::PRODUCT_TAB_ACTIONS.'&id_prod='.$this->get->id_prod);
	}
	
	public function action_delete()
	{
		$action = (new ProductAction)->setData($this->get->id_action)->delete()->setMessage('success', 'delete');
		$this->redirect('product?tab='.self::PRODUCT_TAB_ACTIONS.'&id_prod='.$this->get->id_prod);
	}
	
	public function action_edit()
	{
		$action = (new ProductAction)->setData($this->get->id_action);
		if (!$this->post->save) return $this->render('edit/main', compact('action'));
		$action->editData()->setMessage('success', 'edit');
		$this->redirect('product?tab='.self::PRODUCT_TAB_ACTIONS.'&id_prod='.$this->action->id_prod);
	}
	
	
}