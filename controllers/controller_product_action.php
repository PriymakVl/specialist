<?php
require_once('controller_base.php');
//production time
class Controller_Product_Action extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/product/views/';
		$this->view->title = 'Операции обработки';
    }

    public function action_add()
	{
		$product = new Product(Param::get('id_prod'));
		$params = ParamProductAction::add($product->symbol);
		$data_actions = DataAction::getAll('data_actions');
		if (empty($params['save'])) return $this->render('action/add/main', compact('product', 'data_actions'));
		ProductAction::add($params);
		$this->redirect('product?id_prod='.$product->id);
	}
	
	public function action_delete()
	{
		$action = new ProductAction(Param::get('id'));
		$action->delete();
		$this->redirectPrevious();
	}
	
	public function action_edit()
	{
		$data_actions = DataAction::getAll('data_actions');
		$params = ParamProductAction::edit();
		$action = new ProductAction($params['id']);
		if (!Param::get('save')) return $this->render('action/edit/main', compact('data_actions', 'action', 'params'));
		ProductAction::edit($params);
		$this->redirect('product?id_prod='.$params['id_prod']);
	}
	
	
}