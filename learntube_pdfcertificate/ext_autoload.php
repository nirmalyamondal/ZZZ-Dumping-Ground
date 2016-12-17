<?php
    $extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('learntube_pdfcertificate');

    return array(   
        //'PdfLib' => $extensionPath.'Resources/Private/PHP/fpdfi/fpdf.php',  
		'fpdfi' => $extensionPath.'Resources/Private/PHP/fpdfi/fpdfi.php', 
    );

?>