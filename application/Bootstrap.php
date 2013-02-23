<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	public function _initRoutes()
	{

		$frontController = Zend_Controller_Front::getInstance();
		$router = $frontController->getRouter();
		$route = new Zend_Controller_Router_Route_Static (
				'login',
		array('controller' => 'Account', 'action' => 'login')
		);
		$router->addRoute('login', $route);

		$route = new Zend_Controller_Router_Route_Static (
				'about',
		array('controller' => 'About', '
				action' => 'index')
		);
		$router->addRoute('about', $route);
		
		$route = new Zend_Controller_Router_Route (
				'game/asin/:asin',
		array('controller' => 'Game',
				'action'	=> 'view',
				'asin'	=> 'B000TG530M'	)
		);
		$router->addRoute('game-asin-view', $route);

	}


}

