<?php
require_once('order_action_base.php');

class OrderActionState extends OrderActionBase {
	
    const PLANED = 1; //работа запланирована
    const PROGRESS = 2; //работа выполняется
    const STOPPED = 3; //работа остановлена по какой то причине
    const ENDED = 4; //работа закончена
    const WAITING = 5; //ожидает окончание выполнения предыдущей операции
	
	public $duration;
	public $worker;
	public $name; //name convert state
	public $bg; // backgroun field table
	
	public function __construct($id)
	{
		$this->tableName = 'order_action_states';
        parent::__construct($id);
		$this->message->section = 'order_action_states';
	}
	
	public static function add($params)
	{
		$params = self::selectParams($params, ['id_action', 'time', 'state', 'id_worker', 'type_action']);
		$sql = "INSERT INTO `order_action_states` (id_action, time, state, id_worker, type_action) 
			VALUES (:id_action, :time, :state, :id_worker, :type_action)";
        return self::perform($sql, $params);
	}
	
	public static function getAllByIdAction($params)
	{
		$sql = 'SELECT * FROM `order_action_states` WHERE `id_action` = :id_action AND `status` = :status AND `type_action` = :type';
		return self::perform($sql, $params)->fetchAll();
	}
	
	public function getWorker()
	{
		$this->worker = new Worker($this->id_worker);
		return $this;
	}
	
	public function setDuration($states)
	{
		for ($i = 0; $i < count($states); $i++) {
			if ($states[$i]->id != $this->id) continue;
			if (count($states) == 1) $this->duration = Date::convertTimeToMinutes(time() - $states[0]->time); //только один замер
			else if (empty($states[$i + 1]) && $states[$i]->state != OrderActionState::ENDED) $this->duration =  Date::convertTimeToMinutes(time() - $states[$i]->time);
			else if ($states[$i]->state == OrderActionState::ENDED && empty($states[$i + 1])) $this->duration = false;//операция выполнена
			else $this->duration = self::countDuration($states, $i);
		}
		return $this;
	}
	
	private function countDuration($states, $index)
	{
		if (empty($states[$index + 1])) return false;
		$duration = $states[$index + 1]->time - $states[$index]->time;
		return Date::convertTimeToMinutes($duration);
	}
	
	public function setName()
	{
		switch ($this->state) {
			case self::PLANED: $this->name = 'Операция запланирована'; break;
			case self::PROGRESS: $this->name = 'Операция выполняется'; break;
			case self::STOPPED: $this->name = 'Операция остановлена'; break;
			case self::ENDED: $this->name = 'Операция окончена'; break;
		}
		return $this;
	}
	
	public function setBg()
	{
		switch ($this->state) {
			case self::PLANED: $this->bg = '#fff'; break;
			case self::PROGRESS: $this->bg = 'yellow'; break;
			case self::STOPPED: $this->bg = 'red'; break;
			case self::ENDED: $this->bg = 'green'; break;
		}
		return $this;
	}
	
	
	
	
}























