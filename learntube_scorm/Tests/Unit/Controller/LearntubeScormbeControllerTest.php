<?php
namespace TYPO3\LearntubeScorm\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Nirmalya Mondal <nmondal@learntube.de>, LEARNTUBE! GbR
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class TYPO3\LearntubeScorm\Controller\LearntubeScormbeController.
 *
 * @author Nirmalya Mondal <nmondal@learntube.de>
 */
class LearntubeScormbeControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \TYPO3\LearntubeScorm\Controller\LearntubeScormbeController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('TYPO3\\LearntubeScorm\\Controller\\LearntubeScormbeController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllLearntubeScormbesFromRepositoryAndAssignsThemToView() {

		$allLearntubeScormbes = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$LearntubeScormbeRepository = $this->getMock('TYPO3\\LearntubeScorm\\Domain\\Repository\\LearntubeScormbeRepository', array('findAll'), array(), '', FALSE);
		$LearntubeScormbeRepository->expects($this->once())->method('findAll')->will($this->returnValue($allLearntubeScormbes));
		$this->inject($this->subject, 'LearntubeScormbeRepository', $LearntubeScormbeRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('LearntubeScormbes', $allLearntubeScormbes);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenLearntubeScormbeToView() {
		$LearntubeScormbe = new \TYPO3\LearntubeScorm\Domain\Model\LearntubeScormbe();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('LearntubeScormbe', $LearntubeScormbe);

		$this->subject->showAction($LearntubeScormbe);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenLearntubeScormbeToView() {
		$LearntubeScormbe = new \TYPO3\LearntubeScorm\Domain\Model\LearntubeScormbe();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newLearntubeScormbe', $LearntubeScormbe);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($LearntubeScormbe);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenLearntubeScormbeToLearntubeScormbeRepository() {
		$LearntubeScormbe = new \TYPO3\LearntubeScorm\Domain\Model\LearntubeScormbe();

		$LearntubeScormbeRepository = $this->getMock('TYPO3\\LearntubeScorm\\Domain\\Repository\\LearntubeScormbeRepository', array('add'), array(), '', FALSE);
		$LearntubeScormbeRepository->expects($this->once())->method('add')->with($LearntubeScormbe);
		$this->inject($this->subject, 'LearntubeScormbeRepository', $LearntubeScormbeRepository);

		$this->subject->createAction($LearntubeScormbe);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenLearntubeScormbeToView() {
		$LearntubeScormbe = new \TYPO3\LearntubeScorm\Domain\Model\LearntubeScormbe();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('LearntubeScormbe', $LearntubeScormbe);

		$this->subject->editAction($LearntubeScormbe);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenLearntubeScormbeInLearntubeScormbeRepository() {
		$LearntubeScormbe = new \TYPO3\LearntubeScorm\Domain\Model\LearntubeScormbe();

		$LearntubeScormbeRepository = $this->getMock('TYPO3\\LearntubeScorm\\Domain\\Repository\\LearntubeScormbeRepository', array('update'), array(), '', FALSE);
		$LearntubeScormbeRepository->expects($this->once())->method('update')->with($LearntubeScormbe);
		$this->inject($this->subject, 'LearntubeScormbeRepository', $LearntubeScormbeRepository);

		$this->subject->updateAction($LearntubeScormbe);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenLearntubeScormbeFromLearntubeScormbeRepository() {
		$LearntubeScormbe = new \TYPO3\LearntubeScorm\Domain\Model\LearntubeScormbe();

		$LearntubeScormbeRepository = $this->getMock('TYPO3\\LearntubeScorm\\Domain\\Repository\\LearntubeScormbeRepository', array('remove'), array(), '', FALSE);
		$LearntubeScormbeRepository->expects($this->once())->method('remove')->with($LearntubeScormbe);
		$this->inject($this->subject, 'LearntubeScormbeRepository', $LearntubeScormbeRepository);

		$this->subject->deleteAction($LearntubeScormbe);
	}
}
