<?php

class WorkerBase extends User {

	const TIME_FULL_WORKING_DAY = 390;//рабочее время в сутках в минутах при 8ч рабочем дне (6ч 30мин)
	
	public $timePlan; //time actions for worker in minutes
	public $timePlanPercent = 0;
	public $timePlanHour = 0; //time actions for worker in hours
	public $timePlanMade; //time plan made actions 
	public $timePlanMadeHour;
	public $timeFact = 0;
	public $timeFactHour;
	public $differenceTime; //between plan time and fact time
	//public $loadFullFlage; //если указана трудоемкость для всех деталей
	//public $defaultActions;
	public $cost; //стоимость сделанных операций
	
	public $actions;
	public $currentActions;
	public $currentActionsString = '';
	public $firstActionPlanString;
	public $actionsMade;
	 

}
