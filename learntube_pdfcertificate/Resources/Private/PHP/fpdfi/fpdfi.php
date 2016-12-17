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
	
	public $fpdfi_fileDir;
	//public $fpdfi_uploadDir;
	public $fpdfi_fileName;
	
	public $fpdfi_textText1;
	public $fpdfi_colorText1;
	public $fpdfi_textText2;
	public $fpdfi_colorText2;
	public $fpdfi_textTitle;
	public $fpdfi_colorTitle;
	public $fpdfi_textName;
	public $fpdfi_colorName;
	public $fpdfi_textDate;
	public $fpdfi_colorDate;
	public $fpdfi_imageBack;
	public $fpdfi_checkGroup;
	public $fpdfi_textGroup;
	public $fpdfi_checkVcode;

	public function fpdfi_controller(){
		require_once('fpdf.php');
		$pdf_filePath		= $this->fpdfi_fileDir.$this->fpdfi_fileName;
		$pdf_fileAbsPath	= PATH_site.$this->fpdfi_fileDir.$this->fpdfi_fileName;
		$pdf				= new FPDF('P','mm','A4');
		$pdf->AliasNbPages();
		$pdf->AddPage();	
		//$pdf->Image($this->fileLine3,0,0,216,279); //Left top width	//$pdf->SetMargins(0,0,0);//$pdf->Cell(55);// Move to the right	
		$pdf->Image($this->fpdfi_imageBack,0,0,216,298);
		
		#Name
		$pdf->SetFont('Arial','B',20);
		$clabel_arr	= $this->_hex2rgb($this->fpdfi_colorName);
		$pdf->SetTextColor($clabel_arr[0],$clabel_arr[1],$clabel_arr[2]);//r,g,b: 0 to 255
		$pdf->Ln(100);
		$pdf->Cell(0,10,$this->fpdfi_textName,0,1,'C');
		
		#Text1
		$pdf->SetFont('Arial','',16);
		$clabel_arr	= $this->_hex2rgb($this->fpdfi_colorText1);
		$pdf->SetTextColor($clabel_arr[0],$clabel_arr[1],$clabel_arr[2]);//r,g,b: 0 to 255
		$pdf->Ln(12);
		$pdf->Cell(0,0,$this->fpdfi_textText1,0,1,'C');

		#Text2
		$pdf->SetFont('Arial','',16);
		$clabel_arr	= $this->_hex2rgb($this->fpdfi_colorText2);
		$pdf->SetTextColor($clabel_arr[0],$clabel_arr[1],$clabel_arr[2]);//r,g,b: 0 to 255
		$pdf->Ln(7);
		$pdf->Cell(0,0,$this->fpdfi_textText2,0,1,'C');

		#Title
		$pdf->SetFont('Arial','B',20);
		$clabel_arr	= $this->_hex2rgb($this->fpdfi_colorTitle);
		$pdf->SetTextColor($clabel_arr[0],$clabel_arr[1],$clabel_arr[2]);//r,g,b: 0 to 255
		$pdf->Ln(8);
		$pdf->Cell(0,16,$this->fpdfi_textTitle,0,1,'C');

		#Date
		$pdf->SetFont('Arial','',16);
		$clabel_arr	= $this->_hex2rgb($this->fpdfi_colorDate);
		$pdf->SetTextColor($clabel_arr[0],$clabel_arr[1],$clabel_arr[2]);//r,g,b: 0 to 255
		$pdf->Ln(12);
		$pdf->Cell(0,8,$this->fpdfi_textDate,0,1,'C');
		
		//Output the new PDF
		$pdf->Output($pdf_fileAbsPath);
		if(file_exists($pdf_fileAbsPath)) {	return $pdf_filePath;	}
	return FALSE;	
	}

	function _hex2rgb($hex) {
		if(!$hex){ return array(0, 0, 0); }
		$hex = str_replace("#", "", $hex);
		if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);
		//return implode(",", $rgb); // returns the rgb values separated by commas
	return $rgb; // returns an array with the rgb values
	}

}

?>