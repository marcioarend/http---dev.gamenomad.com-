<?php

class Application_Model_FormCadastro extends Zend_Form
{
	public function __construct($options = null)
	{
		parent::__construct($options);
		$this->setName('login');
		$this->setMethod('post');
		$this->setAction('/account/login');
		$email = new Zend_Form_Element_Text('email');
		$email->setAttrib('size', 35);
		$pswd = new Zend_Form_Element_Password('pswd');
		$pswd->setAttrib('size', 35);
		$submit = new Zend_Form_Element_Submit('submit');
		$this->setDecorators( array( array('ViewScript',
		array('viewScript' => '_form_login.phtml'))));
		$this->addElements(array($email, $pswd, $submit));


	}
}


