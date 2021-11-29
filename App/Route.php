<?php

namespace App;

use MF\Init\Bootstrap; // Importando uma class abstrata

class Route extends Bootstrap
{
	protected function initRoutes() // Quando uma determinada rota for acionada
	{
		$route['index'] = array(
			'route' => '/',						// Rota raíz
			'controller' => 'IndexController',	// Controlador que será solicitado
			'action' => 'index' 				// Ação que vai ocorrer quando a rota for acionada
		);

		$route['cadastre-se'] = array(
			'route' => '/cadastre-se',
			'controller' => 'IndexController',
			'action' => 'cadastrar'
		);

		$route['registrar'] = array(
			'route' => '/registrar',
			'controller' => 'IndexController',
			'action' => 'registrar'
		);
		
		$this->setRoutes($route);
	}
}
?>