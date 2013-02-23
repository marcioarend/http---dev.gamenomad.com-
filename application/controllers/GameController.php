<?php

class GameController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function viewAction()
    {
        $this->view->asin =  $this->getRequest()->getParam('asin');
        
    }


}



