<?php
require_once('./core/controller.php');
require_once('./modules/specification/models/specification.php');

class Controller_Specification extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->view->pathFolder = './modules/specification/views/';
    }

    public function action_content()
	{
	    $specif = new Specification(Param::get('id_specif'));
	    $specif->getProducts();
        $this->view->title = 'Спецификация';
		$this->render('index/main', compact('specif'));
	}

    public function action_activate()
    {
        $id_specif = Param::get('id_specif');
        Session::set('specif-active', $id_specif);
        $this->redirectPrevious();
    }

    public function action_add_product()
    {
        $id_prod = Param::get('id_prod');
        $id_specif = Session::get('specif-active');
        SpecificationContent::add($id_specif, $id_prod);
        $this->redirect('specification/content?id_specif='.$id_specif);
    }


	
}