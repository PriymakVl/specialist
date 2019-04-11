<?php

trait OrderActionModelTerminal {
	
	use OrderActionParamTerminal;

	public function getAllNotReadyForTerminalModel()
	{
		$params = $this->getAllNotReadyForTerminalModelParams();
		$sql = 'SELECT * FROM `order_actions` WHERE `state` < :state AND `type_order` = :type_order AND `status` = :status ORDER BY `rating` DESC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getForAllOrdersForTerminalModel()
	{
		$params = $this->getForAllOrdersForTerminalModelParams();
		$sql = 'SELECT * FROM `order_actions` WHERE `name` = :name AND `state` <> :ended AND `state` <> :waiting AND `type_order` = :type_order 
			AND `status` = :status ORDER BY `rating` DESC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getForOneOrderForTerminalModel()
	{
		$params = $this->getForOneOrderForTerminalModelParams();
		$sql = 'SELECT * FROM `order_actions` WHERE `name` = :name AND (state` <> :ended AND `state` <> :waiting) AND `status` = :status 
			AND `id_order` = :id_order ORDER BY `rating` DESC';
		return self::perform($sql, $params)->fetchAll();
	}
	
	
}























