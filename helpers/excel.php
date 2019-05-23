<?php
include_once('./libraries/phpexcel/Classes/PHPExcel.php');

class Excel
{
    protected $activeSheet;
    protected $objPHPExcel;
	//style properties
	protected $styleBorderThin;
	protected $styleAlignmentCenter;
	protected $styleAlignmentLeftCenter;

	public function __construct()
	{
		$this->objPHPExcel = new PHPExcel();
		$this->setStyleTotalProperties();
	}
	
	public function bildSheet()
	{
		$this->setActiveSheet();
        $this->setSetup();
	}
    
    protected function setActiveSheet() 
    {
        $this->objPHPExcel->setActiveSheetIndex(0);
        $this->activeSheet = $this->objPHPExcel->getActiveSheet();    
    }
    
    protected function setSetup()
    {
        $this->setPageSetup();
        $this->setHeaderAndFooter();
        $this->setFont();  
    }
    
    protected function setPageSetup() 
    {
        $this->activeSheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);//ORIENTATION_LANDSCAPE)
        $this->activeSheet->getPageSetup()->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
						
        $this->activeSheet->getPageMargins()->setTop(0.4);
        $this->activeSheet->getPageMargins()->setRight(0.1);
        $this->activeSheet->getPageMargins()->setLeft(0.2);
        $this->activeSheet->getPageMargins()->setBottom(0.4);
    }
    
    private function setHeaderAndFooter()
    {
        //$this->activeSheet->getHeaderFooter()->setOddFooter();
    }
    
    private function setFont()
    {
        $this->objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
        $this->objPHPExcel->getDefaultStyle()->getFont()->setSize(12);   
    }
    
	private function setStyleTotalProperties()
	{
		$this->styleAlignmentCenter = ['alignment' => ['horizontal' => PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_CENTER, 'vertical' => PHPExcel_STYLE_ALIGNMENT::VERTICAL_CENTER]];
		$this->styleAlignmentLeftCenter = ['alignment' => ['horizontal' => PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_LEFT, 'vertical' => PHPExcel_STYLE_ALIGNMENT::VERTICAL_CENTER]];
		$this->styleBorderThin = ['borders'=> ['allborders'=>['style'=>\PHPExcel_Style_Border::BORDER_THIN, 'color' => ['rgb'=>'000']]]];
	}
	
	public function uploadFile($filename)
	{
		header("Content-Type:application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=".$filename);

        $objWriter = \PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
	}
      
}