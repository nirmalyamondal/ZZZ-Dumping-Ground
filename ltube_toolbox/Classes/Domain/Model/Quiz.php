<?php
namespace TYPO3\LtubeToolbox\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Pranab Ojha <pojha@learntube.in>, Learntube
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
 * @package ltube_toolbox
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Quiz extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * question
	 *
	 * @var \string
	 */
	protected $question;

	/**
	 * answer1
	 *
	 * @var \string
	 */
	protected $answer1;

	/**
	 * answer2
	 *
	 * @var \string
	 */
	protected $answer2;

	/**
	 * answer3
	 *
	 * @var \string
	 */
	protected $answer3;

	/**
	 * answer4
	 *
	 * @var \string
	 */
	protected $answer4;

	/**
	 * hint
	 *
	 * @var \string
	 */
	protected $hint;

	/**
	 * rightAnsFeedback
	 *
	 * @var \string
	 */
	protected $rightAnsFeedback;

	/**
	 * rightAnswer
	 *
	 * @var \integer
	 */
	protected $rightAnswer;

	/**
	 * parentid
	 *
	 * @var \integer
	 */
	protected $parentid;

	/**
	 * parenttable
	 *
	 * @var \string
	 */
	protected $parenttable;

	/**
	 * Returns the question
	 *
	 * @return \string $question
	 */
	public function getQuestion() {
		return $this->question;
	}

	/**
	 * Sets the question
	 *
	 * @param \string $question
	 * @return void
	 */
	public function setQuestion($question) {
		$this->question = $question;
	}

	/**
	 * Returns the answer1
	 *
	 * @return \string $answer1
	 */
	public function getAnswer1() {
		return $this->answer1;
	}

	/**
	 * Sets the answer1
	 *
	 * @param \string $answer1
	 * @return void
	 */
	public function setAnswer1($answer1) {
		$this->answer1 = $answer1;
	}

	/**
	 * Returns the answer2
	 *
	 * @return \string $answer2
	 */
	public function getAnswer2() {
		return $this->answer2;
	}

	/**
	 * Sets the answer2
	 *
	 * @param \string $answer2
	 * @return void
	 */
	public function setAnswer2($answer2) {
		$this->answer2 = $answer2;
	}

	/**
	 * Returns the answer3
	 *
	 * @return \string $answer3
	 */
	public function getAnswer3() {
		return $this->answer3;
	}

	/**
	 * Sets the answer3
	 *
	 * @param \string $answer3
	 * @return void
	 */
	public function setAnswer3($answer3) {
		$this->answer3 = $answer3;
	}

	/**
	 * Returns the answer4
	 *
	 * @return \string $answer4
	 */
	public function getAnswer4() {
		return $this->answer4;
	}

	/**
	 * Sets the answer4
	 *
	 * @param \string $answer4
	 * @return void
	 */
	public function setAnswer4($answer4) {
		$this->answer4 = $answer4;
	}

	/**
	 * Returns the hint
	 *
	 * @return \string $hint
	 */
	public function getHint() {
		return $this->hint;
	}

	/**
	 * Sets the hint
	 *
	 * @param \string $hint
	 * @return void
	 */
	public function setHint($hint) {
		$this->hint = $hint;
	}

	/**
	 * Returns the rightAnsFeedback
	 *
	 * @return \string $rightAnsFeedback
	 */
	public function getRightAnsFeedback() {
		return $this->rightAnsFeedback;
	}

	/**
	 * Sets the rightAnsFeedback
	 *
	 * @param \string $rightAnsFeedback
	 * @return void
	 */
	public function setRightAnsFeedback($rightAnsFeedback) {
		$this->rightAnsFeedback = $rightAnsFeedback;
	}

	/**
	 * Returns the rightAnswer
	 *
	 * @return \integer $rightAnswer
	 */
	public function getRightAnswer() {
		return $this->rightAnswer;
	}

	/**
	 * Sets the rightAnswer
	 *
	 * @param \integer $rightAnswer
	 * @return void
	 */
	public function setRightAnswer($rightAnswer) {
		$this->rightAnswer = $rightAnswer;
	}

	/**
	 * Returns the parentid
	 *
	 * @return \integer $parentid
	 */
	public function getParentid() {
		return $this->parentid;
	}

	/**
	 * Sets the parentid
	 *
	 * @param \integer $parentid
	 * @return void
	 */
	public function setParentid($parentid) {
		$this->parentid = $parentid;
	}

	/**
	 * Returns the parenttable
	 *
	 * @return \string $parenttable
	 */
	public function getParenttable() {
		return $this->parenttable;
	}

	/**
	 * Sets the parenttable
	 *
	 * @param \string $parenttable
	 * @return void
	 */
	public function setParenttable($parenttable) {
		$this->parenttable = $parenttable;
	}

}
?>