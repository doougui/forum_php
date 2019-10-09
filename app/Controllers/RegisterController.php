<?php 
	namespace App\Controllers;

	use App\Controllers\Render;
	use Src\Interfaces\InterfaceView;

	class RegisterController extends Render implements InterfaceView {
		public function index() {
			$data = [];

			$this -> setDir('Register');
			$this -> setTitle('Forum - Registro');
			$this -> setDescription('Crie sua conta.');
			$this -> setKeywords('forum, dev, registro, register');

			$this -> renderLayout($data);
		}
	}