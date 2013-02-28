<?php

class GameController extends Zend_Controller_Action
{


	public function init()
	{
		//$this->createData();
	}

	public function indexAction()
	{
		$gameTable = new Application_Model_DbTable_Game();
		// wir haben mehr antwort
		//$game = $gameTable->find(1);
		//echo "{$game[0]->name} (ASIN: {$game[0]->asin})";
		// Nur eine
		$game = $gameTable->find(1)->current();
		echo "{$game->name} (ASIN: {$game->asin})<br />";


		$game = $gameTable->findByAsin("B0028IBTL6");
		echo "{$game->name} (ASIN: {$game->asin})<br />
		";

		$games = $gameTable->greatThenPrice("10");
		foreach ($games as $game){
			echo "loop {$game->id} (ASIN: {$game->asin})<br />
			";
		}

		$query = $gameTable->select()->where("rel < ?", "2011-01-01");
		$results = $gameTable->fetchAll($query);
		foreach($results AS $result)
		{
			echo "{$result->name} (Sales Rank: {$result->latestSalesRank()})<br />";
		}


	}

	public function viewAction()
	{
		$this->view->asin =  $this->getRequest()->getParam('asin');

	}

	private function createData(){

		$gameTable = new Application_Model_DbTable_Game();
		$data = array(
			'asin' => 'B0028IBTL6',
			'name' => 'Fallout: New Vegas',
			'price' => '59.99',
			'publisher' => 'Bethesda',
			'rel' => '2010-10-19',
			'small' => 'a',
  			'medium' => 'a',
  			'created'=>'2010-10-19', 
		    'updated'=>'2010-10-19'
		);
			
			
			

		 
			
			
			
		$game = $gameTable->insert($data);
		$game = $gameTable->insert($data);
		$game = $gameTable->insert($data);
			
	}

}



