<?php 
	namespace App\Controllers;

	use App\Controllers\Render;
	use Src\Interfaces\InterfaceView;

	class LoginController extends Render implements InterfaceView {
		public function index() {
			unset($_SESSION['user']);

			$data = [];

			$this -> setDir('Login');
			$this -> setTitle('Forum - Login');
			$this -> setDescription('Entre na sua conta.');
			$this -> setKeywords('forum, dev, entrar, login');

			$this -> renderLayout($data);
		}

		public function logout() {
			unset($_SESSION['user']);
			header('Location: '.DIRPAGE.'login');
		}
	}