<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{
	public function timeline()
	{
		$this->validarAutenticacao();
		$this->render('timeline');
	}

	public function validarAutenticacao()
	{
		session_start();

		if(!isset($_SESSION['id_usuario']) || $_SESSION['id_usuario'] == '' || 
			!isset($_SESSION['nome']) || $_SESSION['nome'] == '')
			header('Location: /?login=erro');
	}
}
?>