<?php
require_once('controller_base.php');
//production time
class Controller_Action extends Controller_Base {

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
		$actions = Action::getAll('actions');
		if (empty($params['id_action'])) return $this->render('action/add/main', compact('product', 'actions'));
		ProductAction::add($params);
		$this->redirect('product?id_prod='.$product->id);
	}
	
	public function action_delete()
	{
		ProductAction::deleteOne(Param::get('id_action'));
		$this->redirectPrevious();
	}
	
	public function action_edit()
	{
		$actions = Action::getAll('actions');
		$prod_action = new ProductAction(Param::get('id_prod_action'));
		$prod_action->setName();
		if (!Param::get('save')) return $this->render('action/edit/main', compact('actions', 'prod_action'));
		ProductAction::edit(ParamProductAction::edit());
		$this->redirect('product?id_prod='.Param::get('id_prod'));
	}
	
	
}