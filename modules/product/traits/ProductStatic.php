<?php

trait ProductStatic  {

	use ProductModel;
	
	public static function editAllStatic($symbol)
	{
		self::editAllModel();
		//ProductAction::editSymbol($symbol); todo
	}
	
	public static function copyStatic($prod_templ)
	{
		$params = $prod_templ->getDataArray($prod_templ->get->id_prod);
		$params['id_parent'] = $prod_templ->session->id_prod_active;
		unset($params['id'], $params['status']);
		return self::addDataModel($params);
	}
	

	


	
}