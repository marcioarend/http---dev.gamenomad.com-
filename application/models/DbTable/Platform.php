<?php

class Application_Model_DbTable_Platform extends Zend_Db_Table_Abstract
{

    protected $_name = 'plataforms';
    
    protected $_dependentTables = array('Application_Model_DbTable_Game');
    


}

