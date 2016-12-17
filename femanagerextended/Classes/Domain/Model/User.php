<?php
namespace In2\Femanagerextended\Domain\Model;

class User extends \In2\Femanager\Domain\Model\User {

	/**
	 * tncId
	 *
	 * @var \string
	 */
	protected $tncId;

	/**
	 * skypeId
	 *
	 * @var \string
	 */
	//protected $skypeId;

	/**
	 * Returns the tncId
	 *
	 * @return \string $tncId
	 */
	public function getTncId() {
		return $this->tncId;
	}

	/**
	 * Sets the tncId
	 *
	 * @param \string $tncId
	 * @return void
	 */
	public function setTncId($tncId) {
		$this->tncId = $tncId;
	}


	/**
	 * Returns the txLltubetopicsystemBtopic
	 *
	 * @return \string $txLltubetopicsystemBtopic
	 */
	public function getTxLtubetopicsystemBtopic() {
		return $this->txLltubetopicsystemBtopic;
	}

	/**
	 * Sets the txLltubetopicsystemBtopic
	 *
	 * @param \string $txLltubetopicsystemBtopic
	 * @return void
	 */
	public function setTxLtubetopicsystemBtopic($txLltubetopicsystemBtopic) {
		$this->txLltubetopicsystemBtopic = $txLltubetopicsystemBtopic;
	}

	/**
	 * Returns the skypeId
	 *
	 * @return \string $skypeId
	 */
	/*public function getSkypeId() {
		return $this->skypeId;
	}*/

	/**
	 * Sets the skypeId
	 *
	 * @param \string $skypeId
	 * @return void
	 */
	/*public function setSkypeId($skypeId) {
		$this->skypeId = $skypeId;
	}*/

	/**
	 * @param string $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

}
?>