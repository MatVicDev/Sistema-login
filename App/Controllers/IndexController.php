<?php

namespace App\Controllers;

use MF\Controller\Action; // Importando a classe Action
use MF\Model\Container;

class IndexController extends Action // Extendendo de uma classe abstrata
{
	public function index()
	{
		$this->render('index');
	}

	public function cadastrar()
	{
		$this->view->usuario = array(
			'nome' => '',
			'email' => '',
			'senha1' => '',
			'senha2' => '',
		);
		$this->view->erroCadastro = false;
		$this->render('cadastrese');
	}

	public function registrar()
	{
		$senhas_iguais = $_POST['senha1'] == $_POST['senha2'] ? true : false;

		$usuario = Container::getModel('Usuario');
		$usuario->__set('nome', $_POST['nome']);
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', $_POST['senha1']);

		if($usuario->validarCadastro() && count($usuario->getEmailUsuario()) == 0 && $senhas_iguais) {

			$usuario->salvar();
			header('Location: /');
		} else {
			$this->view->usuario = array(
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'senha1' => $_POST['senha1'],
				'senha2' => $_POST['senha2'],
			);
			$this->view->erroCadastro = true;
			$this->render('cadastrese');
		}		
	}
}
?>
