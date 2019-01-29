<?php

class ExcelRobots extends Excel
{
	private $url;
	private $response;
	
	public function __construct(Url $url, $response)
	{
		parent::__construct();
		$this->url = $url;
		$this->response = $response;
	}
	
	public function bildSheet()
	{
		parent::bildSheet();
		$this->bildColumn();
		$this->bildFields();
		$this->setStyleSheet();
	}
	
	private function setStyleSheet()
	{
		$this->setStyleTotal();
		$this->setStyleColumnName();
		$this->setStyleFieldExistFile();
		$this->setStyleFieldExistHost();
	}
	
	private function bildColumn()
	{
		$this->setWidthOfColumn(); 
        $this->setColumnName();
	}
	
    private function setWidthOfColumn()
    {
        $this->activeSheet->getColumnDimension('A')->setWidth(6);
        $this->activeSheet->getColumnDimension('B')->setWidth(50);
        $this->activeSheet->getColumnDimension('C')->setWidth(10);
        $this->activeSheet->getColumnDimension('D')->setWidth(18);
        $this->activeSheet->getColumnDimension('E')->setWidth(60);
    }
    
    private function setColumnName()
    {
        $this->activeSheet->getRowDimension('1')->setRowHeight(20);
        $this->activeSheet->setCellValue('A1','№');
        $this->activeSheet->setCellValue('B1','Название проверки');
        $this->activeSheet->setCellValue('C1','Статус');
        $this->activeSheet->setCellValue('D1','Текущее состояние');
		$this->activeSheet->mergeCells('D1:E1');
    }
	
	private function setStyleColumnName()
	{
		$this->activeSheet->getStyle('A1:E1')->applyFromArray($this->styleAlignmentCenter);
		$this->activeSheet->getStyle('A1:E1')->applyFromArray(['font' => ['bold' => true, 'size' => 13]]);
	}
	
	private function bildFields()
	{
		$this->bildFieldExistFile();
		$this->bildFieldExistHost();
	}
	
	private function bildFieldExistFile()
	{
		$this->activeSheet->setCellValue('A2', 1);
		$this->activeSheet->mergeCells('A2:A3');
		$this->activeSheet->setCellValue('B2', 'Проверка наличия файла robots.txt');
		$this->activeSheet->mergeCells('B2:B3');
		$this->activeSheet->setCellValue('C2', $this->response['exist_file']['status']);
		$this->activeSheet->mergeCells('C2:C3');
		$this->activeSheet->setCellValue('D2', 'Состояние');
		$this->activeSheet->setCellValue('E2', $this->response['exist_file']['description']);
		$this->activeSheet->setCellValue('D3', 'Рекомендации');
		$this->activeSheet->setCellValue('E3', $this->response['exist_file']['recommendation']);
	}
	
	private function bildFieldExistHost()
	{
		$this->activeSheet->setCellValue('A5', 2);
		$this->activeSheet->mergeCells('A5:A6');
		$this->activeSheet->setCellValue('B5', 'Проверка указания директивы Host');
		$this->activeSheet->mergeCells('B5:B6');
		$this->activeSheet->setCellValue('C5', $this->response['exist_host']['status']);
		$this->activeSheet->mergeCells('C5:C6');
		$this->activeSheet->setCellValue('D5', 'Состояние');
		$this->activeSheet->setCellValue('E5', $this->response['exist_host']['description']);
		$this->activeSheet->setCellValue('D6', 'Рекомендации');
		$this->activeSheet->setCellValue('E6', $this->response['exist_host']['recommendation']);
	}
	
	private function setStyleTotal()
	{
		$this->activeSheet->getStyle('A1:E6')->applyFromArray($this->styleBorderThin);
		$this->activeSheet->mergeCells('A4:E4');
	}
	
	private function setStyleFieldExistFile()
	{
		$this->activeSheet->getStyle('A2:C2')->applyFromArray($this->styleAlignmentCenter);
		$this->activeSheet->getStyle('D3')->applyFromArray($this->styleAlignmentLeftCenter);
		$this->setBackgroundFieldStatus('2', $this->response['exist_file']['status']);
		$this->activeSheet->getStyle('E3')->getAlignment()->setWrapText(true);
	}
	
	private function setStyleFieldExistHost()
	{
		$this->activeSheet->getStyle('A5:C5')->applyFromArray($this->styleAlignmentCenter);
		$this->activeSheet->getStyle('D6')->applyFromArray($this->styleAlignmentLeftCenter);
		$this->setBackgroundFieldStatus('5', $this->response['exist_host']['status']);
		$this->activeSheet->getStyle('E6')->getAlignment()->setWrapText(true);
	}
	
	private function setBackgroundFieldStatus($number, $status)
	{
		$rgb = ($status == RevisionRobots::STATUS_SUCCESS) ? '339866' : 'FF8080';
		$style_status = ['fill' => ['type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => ['rgb' => $rgb]]];
		$this->activeSheet->getStyle('C'.$number)->applyFromArray($style_status);
	}
	

}