<?php

class Application_Model_FormLogin extends Zend_Form{


	public function __construct($options = null)
	{
		parent::__construct($options);
		$this->setName('login');
		$this->setMethod('post');
		$this->setAction($options['action']);
		
		$email = new Zend_Form_Element_Text('email');
		$email->setAttrib('size', 35)
				->removeDecorator('label')
				->removeDecorator('htmlTag')
				->setRequired(true)
				->addValidator('emailAddress');
				
				
		
		$pswd = new Zend_Form_Element_Password('pswd');
		$pswd->setAttrib('size', 35)
				->removeDecorator('label')
				->removeDecorator('htmlTag')
				->addValidator('StringLength', false, array(4,15));
				
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->removeDecorator('DtDdWrapper');
		
		$this->setDecorators( array( array('ViewScript',

			array('viewScript' => '_form_login.phtml'))));
		$this->addElements(array($email, $pswd, $submit));
	}





}

