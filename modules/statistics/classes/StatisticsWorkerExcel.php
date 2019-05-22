<?php

class StatisticsWorkerExcel extends Excel
{
	private $worker;
	
	public function __construct(Worker $worker)
	{
		parent::__construct();
		$this->worker = $worker;
	}
	
	public function bildSheet()
	{
		parent::bildSheet();
		$this->bildColumn();
		$this->bildCellsData();
		$this->setStyleSheet();
		return $this;
	}
	
	private function setStyleSheet()
	{
		$this->setStyleTotal();
		$this->setStyleColumnName();
		// $this->setStyleFieldExistFile();
		// $this->setStyleFieldExistHost();
	}
	
	private function bildColumn()
	{
		$this->setWidthOfColumn(); 
        $this->setColumnName();
	}
	
    private function setWidthOfColumn()
    {
        $this->activeSheet->getColumnDimension('A')->setWidth(6);//№
        $this->activeSheet->getColumnDimension('B')->setWidth(20);//Заказ
        $this->activeSheet->getColumnDimension('C')->setWidth(30);//Продукт
        $this->activeSheet->getColumnDimension('D')->setWidth(20);//Операция
        $this->activeSheet->getColumnDimension('E')->setWidth(10);//Количество
        $this->activeSheet->getColumnDimension('F')->setWidth(20);//трудоем плановая
        $this->activeSheet->getColumnDimension('G')->setWidth(20);//трудоем фактич
        $this->activeSheet->getColumnDimension('H')->setWidth(20);//примечание
    }
    
    private function setColumnName()
    {
        $this->activeSheet->getRowDimension('1')->setRowHeight(20);
        $this->activeSheet->setCellValue('A1', '№');
        $this->activeSheet->setCellValue('B1', 'Заказ');
        $this->activeSheet->setCellValue('C1', 'Продукт');
        $this->activeSheet->setCellValue('D1', 'Операция');
        $this->activeSheet->setCellValue('E1', 'Кол-во');
        $this->activeSheet->setCellValue('F1', 'Труд-сть плановая');
        $this->activeSheet->setCellValue('G1', 'Труд-ть факт.');
        $this->activeSheet->setCellValue('H1', 'Примечания');

    }
	
	private function setStyleColumnName()
	{
		$this->activeSheet->getStyle('A1:H1')->applyFromArray($this->styleAlignmentCenter);
		$this->activeSheet->getStyle('A1:H1')->applyFromArray(['font' => ['bold' => true, 'size' => 13]]);
	}
	
	private function bildCellsData()
	{
		$number = 1;
		$number_row = 2;
		foreach ($this->worker->actionsMade as $action) {
			$this->activeSheet->setCellValue('A'.$number_row, $number);
			//order
			$this->activeSheet->setCellValue('B'.$number_row, $action->order ? $action->order->symbol : '');
			//product
			$this->activeSheet->setCellValue('C'.$number_row, $action->product ? $action->product->symbol.': '.$action->product->name : '');
			//action 
			$this->activeSheet->setCellValue('D'.$number_row, $action->name);
			//action quantity
			$this->activeSheet->setCellValue('E'.$number_row, $action->qty);
			$number++;
			$number_row++;
		}
		//$this->activeSheet->mergeCells('A2:A3');
	}
	
	private function setStyleTotal()
	{
		// $this->activeSheet->getStyle('A1:E6')->applyFromArray($this->styleBorderThin);
		// $this->activeSheet->mergeCells('A4:E4');
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