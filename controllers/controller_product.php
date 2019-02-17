<?php
require_once('controller_base.php');

class Controller_Product extends Controller_Base {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/product/views/';
    }

    public function action_index()
	{
		$product = new Product(Param::get('id_prod'));
		$id_active = Session::get('product-active');
		$product->getSpecification();
        $this->view->title = 'Производство';
		$this->render('index/main', compact('product', 'id_active'));
	}

	public function action_popular()
    {
        $this->view->title = 'Популярные';
        $this->render('popular/main');
    }

	public function action_add()
    {
        $params = ParamProduct::add();
		if (isset($params['name'])) {
			Product::add($params);
			$this->redirect('product?id_prod='.$params['id_parent']);
		}
		$this->render('add/main', compact('params'));
    }
	
	public function action_edit()
    {
        $params = ParamProduct::edit();
		$product = new Product(Param::get('id_prod'));
		if (isset($params['name'])) {
			$result = Product::edit($params, $product);
			if ($result) $this->redirect('product?id_prod='.$product->id);
		}
		$this->render('edit/main', compact('product'));
    }
	
	public function action_copy()
	{
		$params = ParamProduct::copy();
		if (empty($params['id_parent'])) exit('Нет активного узла');
		Product::add($params);
		$this->redirect('product?id_prod='.$params['id_parent']);
	}
	
	public function action_activate()
	{
		$id_prod = Param::get('id_prod');
		Session::set('product-active', $id_prod);
        $this->redirectPrevious();
	}
	
	public function action_delete()
	{
		$id_prod = Param::get('id_prod');
		$product = new Product($id_prod);
		$product->delete();
		$this->redirect('product?id_prod='.$product->id_parent);
	}

    
	
}