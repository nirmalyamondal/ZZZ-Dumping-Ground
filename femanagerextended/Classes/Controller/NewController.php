<?php
namespace In2\Femanagerextended\Controller;

class NewController extends \In2\Femanager\Controller\NewController {
	protected $tx_ltubetopicsystem_btopic;
	/**
	 * action create
	 *
	 * @param \In2\Femanagerextended\Domain\Model\User $user
	 * @validate $user In2\Femanager\Domain\Validator\ServersideValidator
	 * @validate $user In2\Femanager\Domain\Validator\PasswordValidator
	 * @return void
	 */
	public function createAction(\In2\Femanagerextended\Domain\Model\User $user) {
		//print_r($user);
		//$user['tx_ltubetopicsystem_btopic:protected'] = 1;
		$user->tx_ltubetopicsystem_btopic = 1;
		//print_r($user); exit();
		parent::createAction($user);
	}
}
?>