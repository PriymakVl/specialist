<?php

trait ProductTotal  {

	use ProductModel;
	
	public function editAll($symbol)
	{
		$this->editAllModel();
		//ProductAction::editSymbol($symbol); todo
	}
	
	public function copyTotal()
	{
		$params = $this->getDataArray($this->id);
		$params['id_parent'] = $this->session->id_prod_active;
		unset($params['id'], $params['status']);
		return $this->addDataModel($params);
	}
	

	


	
}