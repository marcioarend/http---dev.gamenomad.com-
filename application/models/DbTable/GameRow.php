<?php

class Application_Model_DbTable_GameRow extends Zend_Db_Table_Row_Abstract
{

	
	function latestSalesRank()
	{
		$rank = new Application_Model_DbTable_Rank();
		$query = $rank->select('rank');
		$query->where('game_id = ?', $this->id);
		$query->order('created DESC');
		$query->limit(1);
		$row = $rank->fetchRow($query);
		return $row->rank;
	}



}

