<?php

class StatisticsWorkerExcel extends Excel
{
	private $worker;
	public $actionName;
	public $period;
	public $numberRow;//for style table
	
	public function __construct(Worker $worker)
	{
		parent::__construct();
		$this->worker = $worker;
	}
	
	public function setActionName($action)
	{
		if (!$action) $this->actionName = 'Все';
		else if ($action == 'other') $this->actionName = 'Разные';
		else $this->actionName = $action;
		return $this;
	}
	
	public function bildSheet()
	{
		parent::bildSheet();
		$this->bildHeader();
		$this->bildTable();
		$this->bildCellsData();
		$this->setStyleSheet();
		return $this;
	}
	
	private function setStyleSheet()
	{
		$this->setStyleTotal();
		$this->setStyleTableHeader();
		// $this->setStyleFieldExistFile();
		// $this->setStyleFieldExistHost();
	}
	
	private function bildTable()
	{
		$this->setWidthOfColumn(); 
        $this->setColumnTableName();
	}
	
    private function setWidthOfColumn()
    {
        $this->activeSheet->getColumnDimension('A')->setWidth(6);//№
        $this->activeSheet->getColumnDimension('B')->setWidth(20);//Заказ
        $this->activeSheet->getColumnDimension('C')->setWidth(40);//Продукт
        $this->activeSheet->getColumnDimension('D')->setWidth(20);//Операция
        $this->activeSheet->getColumnDimension('E')->setWidth(10);//Количество
        $this->activeSheet->getColumnDimension('F')->setWidth(20);//трудоем плановая
        $this->activeSheet->getColumnDimension('G')->setWidth(20);//трудоем фактич
        $this->activeSheet->getColumnDimension('H')->setWidth(20);//примечание
    }
	
	private function bildHeader()
	{
		$this->activeSheet->setCellValue('A1', 'Статистика для: '.$this->worker->title);
		$this->activeSheet->mergeCells('A1:H1');
		$this->activeSheet->setCellValue('A2', 'Наименование операции: '.$this->actionName);
		$this->activeSheet->mergeCells('A2:H2'); 
		$this->activeSheet->setCellValue('A3', sprintf('Период от: %s г. до %s г.', $this->period->start, $this->period->end));
		$this->activeSheet->mergeCells('A3:H3');
	}
    
    private function setColumnTableName()
    {
        $this->activeSheet->getRowDimension('5')->setRowHeight(20);
        $this->activeSheet->setCellValue('A5', '№');
        $this->activeSheet->setCellValue('B5', 'Заказ');
        $this->activeSheet->setCellValue('C5', 'Продукт');
        $this->activeSheet->setCellValue('D5', 'Операция');
        $this->activeSheet->setCellValue('E5', 'Кол-во');
        $this->activeSheet->setCellValue('F5', 'Труд-сть плановая');
        $this->activeSheet->setCellValue('G5', 'Труд-ть факт.');
        $this->activeSheet->setCellValue('H5', 'Примечания');

    }
	
	private function setStyleTableHeader()
	{
		$this->activeSheet->getStyle('A5:H5')->applyFromArray(['font' => ['bold' => true, 'size' => 13]]);
	}
	
	private function bildCellsData()
	{
		$number = 1;
		$this->numberRow = 6;
		foreach ($this->worker->actionsMade as $action) {
			$this->activeSheet->setCellValue('A'.$this->numberRow, $number);
			//order
			$this->activeSheet->setCellValue('B'.$this->numberRow, $action->order ? $action->order->symbol : '');
			//product
			$this->activeSheet->setCellValue('C'.$this->numberRow, $action->product ? $action->product->symbol.': '.$action->product->name : '');
			//action 
			$this->activeSheet->setCellValue('D'.$this->numberRow, $action->name);
			//action quantity
			$this->activeSheet->setCellValue('E'.$this->numberRow, $action->qty);
			//time plan
			$this->activeSheet->setCellValue('F'.$this->numberRow, $this->convertTimePlan($action));
			//time fact
			$this->activeSheet->setCellValue('G'.$this->numberRow, $this->convertTimeFact($action));
			//note 
			$this->activeSheet->setCellValue('H'.$this->numberRow, $action->note);
			$number++;
			$this->numberRow++;
		}
	}
	
	private function convertTimePlan($action)
	{
		if ($action->timePlanDivision) return  sprintf("%uчас. %uмин.", $action->timePlanDivision->hours, $action->timePlanDivision->minutes);
		if ($action->timePlan) return sprintf('%uмин.', $action->timePlan); 
		return 'нет';
	}
	
	private function convertTimeFact($action)
	{
		if ($action->timeFactDivision) return  sprintf("%uчас. %uмин.", $action->timeFactDivision->hours, $action->timeFactDivision->minutes);
		if ($action->timeFact) return sprintf('%uмин.', $action->timeFact); 
		return 'нет';
	}
	
	private function setStyleTotal()
	{
		$this->activeSheet->getStyle('A5:H'.$this->numberRow)->applyFromArray($this->styleBorderThin);
		$this->activeSheet->getStyle('A5:H'.$this->numberRow)->applyFromArray($this->styleAlignmentCenter);
	}
	
	// private function setStyleFieldExistFile()
	// {
		// $this->activeSheet->getStyle('A2:C2')->applyFromArray($this->styleAlignmentCenter);
		// $this->activeSheet->getStyle('D3')->applyFromArray($this->styleAlignmentLeftCenter);
		// $this->setBackgroundFieldStatus('2', $this->response['exist_file']['status']);
		// $this->activeSheet->getStyle('E3')->getAlignment()->setWrapText(true);
	// }
	
	// private function setStyleFieldExistHost()
	// {
		// $this->activeSheet->getStyle('A5:C5')->applyFromArray($this->styleAlignmentCenter);
		// $this->activeSheet->getStyle('D6')->applyFromArray($this->styleAlignmentLeftCenter);
		// $this->setBackgroundFieldStatus('5', $this->response['exist_host']['status']);
		// $this->activeSheet->getStyle('E6')->getAlignment()->setWrapText(true);
	// }
	
	// private function setBackgroundFieldStatus($number, $status)
	// {
		// $rgb = ($status == RevisionRobots::STATUS_SUCCESS) ? '339866' : 'FF8080';
		// $style_status = ['fill' => ['type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => ['rgb' => $rgb]]];
		// $this->activeSheet->getStyle('C'.$number)->applyFromArray($style_status);
	// }
	

}