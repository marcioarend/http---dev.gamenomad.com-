<?php

class AccountController extends Zend_Controller_Action
{

	public function init()
	{
		/* Initialize action controller here */
	}

	public function indexAction()
	{
		// action body
	}

	public function loginAction()
	{
		$form = new Application_Model_FormLogin(array('action'=> '/account/login'));
		if ($this->getRequest()->isPost()) {
			$email = $form->getValue('email');
			$pswd = $form->getValue('pswd');
			echo "<p>Your e-mail is {$email}, and password is {$pswd}</p>";

			if ($form->isValid($this->_request->getPost())){
				$db = Zend_Db_Table::getDefaultAdapter();
				$authAdapter = new Zend_Auth_Adapter_DbTable($db);
				$authAdapter->setTableName('accounts');
				$authAdapter->setIdentityColumn('email');
				$authAdapter->setCredentialColumn('pswd');
				$authAdapter->setCredentialTreatment('MD5(?) and confirmed = 1');
				$authAdapter->setIdentity($form->getValue('email'));
				$authAdapter->setCredential($form->getValue('pswd'));
				$auth = Zend_Auth::getInstance();
				$result = $auth->authenticate($authAdapter);
				// Did the user successfully login?
				if ($result->isValid()) {
					$account = new Application_Model_Account();
					$lastLogin = $account->findByEmail($form->getValue('email'));
					$lastLogin->last_login = date('Y-m-d H:i:s');
					$lastLogin->save();
					$this->_helper->flashMessenger->addMessage('You are logged in');
					$this->_helper->redirector('index', 'index');
				} else {
					$this->view->errors["form"] = array("Login failed.");
				}
			} else {
				$this->view->errors = $form->getErrors();
			}
		}


 	
		$this->view->form = $form;
			
	}


}



