<?php
/*$parser = "default";

if ($parser === 'default') {
    $includePath = get_include_path() . PATH_SEPARATOR . "G:\xampp\htdocs\pdf\/";
} else {
    $includePath = "G:\xampp\htdocs\pdf\/" . PATH_SEPARATOR  . get_include_path() . PATH_SEPARATOR . "G:\xampp\htdocs\pdf\/";
}

set_include_path($includePath);
*/


class fpdfi {
	
	public $fpdfi_pdf_filepath;
	public $fpdfi_pdf_filename;
	public $fpdfi_pdf_username;
	public $fpdfi_pdf_userfullname;

	public function fpdfi_controller(){
		require_once('fpdf.php');
		require_once('fpdi.php');
		require_once('fpdi_pdf_parser.php');		
		$pdf_file		= $this->fpdfi_pdf_filepath.$this->fpdfi_pdf_username.$this->fpdfi_pdf_filename;
		$dirAbs			= PATH_site.$this->fpdfi_pdf_filepath;	
		$pdf_file_abs	= PATH_site.$pdf_file;
		if(!is_dir($dirAbs)) {	@mkdir($dirAbs, 0755);	}
		
		//echo '$pdf_file='.$pdf_file; echo '$dirAbs='.$dirAbs;
		//if(file_exists($dirAbs.$pdf_file)) {	return FALSE;	}

		// initiate FPDI
		$pdf		= new FPDI();
		// get the page count
		$pageCount	= $pdf->setSourceFile($pdf_file_abs);
		// iterate through all pages
		for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
			// import a page
			$templateId = $pdf->importPage($pageNo);
			// get the size of the imported page
			$size = $pdf->getTemplateSize($templateId);
			$pdf->SetMargins(0,0,0);
			// create a page (landscape or portrait depending on the imported page size)
			if ($size['w'] > $size['h']) {
				$pdf->AddPage('L', array($size['w'], $size['h']));
			} else {
				$pdf->AddPage('P', array($size['w'], $size['h']));
			}
			//use the imported page
			$pdf->useTemplate($templateId);
			//Begin with regular font
			$pdf->SetFont('Arial','B',10);
			//$pdf->SetY(-22);
			$pdf->Cell('','',$this->fpdfi_pdf_userfullname,0,0,'R');
			/*
			//$pdf->Cell('','',$this->fpdfi_pdf_userfullname,1,0,'R');
			//$pdf->Write(3,$this->fpdfi_pdf_userfullname);
			//Then put a blue underlined link
			//$pdf->SetTextColor(0,0,255);
			//$pdf->SetFont('','U');
			//$pdf->Write(3,'www.wissen-rechnet-sich.de','http://www.wissen-rechnet-sich.de/');
			*/			
		}

		// Output the new PDF
		$pdf->Output($pdf_file_abs);
	}

}

?>