<?php
namespace TYPO3\LtubeIffuserpdf\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Nirmalya Mondal <nmondal@learntube.de>, Learntube GmbH!
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * PdfGenerate
 */
class PdfGenerate extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * pdffile
	 * 
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $pdffile = NULL;

	/**
	 * pdftitle
	 * 
	 * @var string
	 */
	protected $pdftitle = '';

	/**
	 * Returns the pdffile
	 * 
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $pdffile
	 */
	public function getPdffile() {
		return $this->pdffile;
	}

	/**
	 * Sets the pdffile
	 * 
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $pdffile
	 * @return void
	 */
	public function setPdffile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $pdffile) {
		$this->pdffile = $pdffile;
	}

	/**
	 * Returns the pdftitle
	 * 
	 * @return string $pdftitle
	 */
	public function getPdftitle() {
		return $this->pdftitle;
	}

	/**
	 * Sets the pdftitle
	 * 
	 * @param string $pdftitle
	 * @return void
	 */
	public function setPdftitle($pdftitle) {
		$this->pdftitle = $pdftitle;
	}

}