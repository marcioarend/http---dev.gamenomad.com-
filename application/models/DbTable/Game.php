<?php

class Application_Model_DbTable_Game extends Zend_Db_Table_Abstract
{

	protected $_name = 'games';
	protected $_rowClass = 'Application_Model_DbTable_GameRow';
	
	protected $_referenceMap = array (
		'Platform' => array (
		'columns'=> array('platform_id'),
		'refTableClass' => 'Application_Model_DbTable_Platform')
	);
	

	function findByAsin($asin) {
		$query = $this->select();
		$query->where('asin = ?', $asin);
		$result = $this->fetchRow($query);
		return $result;
	}

	function greatThenPrice($price){
		$query = $this->select();
		$query->where('price > ?',$price);
		$result = $this->fetchAll($query);
		return $result;
	}
}

