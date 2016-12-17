<?php
namespace T3e\T3eVideoJumper\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Marius Büscher <marius.buescher@gmx.de>
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
 *
 *
 * @package videojumper
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class VideoController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * Initialize view
     *
     * @param \TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view the view
     * @return void
     * @author Marius Büscher
     **/
    public function initializeView(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view)
    {
    }

	/**
	 * action default
	 *
	 * @return void
	 */
	public function defaultAction() {
        $videoFiles = str_getcsv($this->settings['videoFiles']);

        $this->view->assignMultiple( array (
            'videoFiles' => $videoFiles,
            'nextPage' => $this->settings['nextPage'],
            'posterImage' => $this->settings['posterImage'],
            'autostart' => $this->settings['autostart'],
            'bigButton' => $this->settings['bigButton'],
            'disallow_forward' => ($this->settings['disallowSkip'] == 1 || $this->settings['disallowSkip'] == 3) ? true : false,
            'disallow_backward' => ($this->settings['disallowSkip'] == 2 || $this->settings['disallowSkip'] == 3) ? true : false,
        ));

		$pageRenderer = $GLOBALS['TSFE']->getPageRenderer();
		$pageRenderer->addJsFooterFile('typo3conf/ext/t3e_videojumper/Resources/Public/JS/jQuery/jquery-1.11.0.min.js');
		$pageRenderer->addJsFooterFile('typo3conf/ext/t3e_videojumper/Resources/Public/JS/Projekktor/projekktor-universal.min.js');
		$pageRenderer->addJsFooterFile('typo3conf/ext/t3e_videojumper/Resources/Public/JS/ResponsiveJS/responsive.js');
		$pageRenderer->addJsFooterFile('typo3conf/ext/t3e_videojumper/Resources/Public/JS/Modernizr/modernizr.min.js');
		$pageRenderer->addJsFooterFile('typo3conf/ext/t3e_videojumper/Resources/Public/JS/videojumper.js');
		$pageRenderer->addCssFile('typo3conf/ext/t3e_videojumper/Resources/Public/css/t3e_videojumper.css'); 
	}

}
?>
