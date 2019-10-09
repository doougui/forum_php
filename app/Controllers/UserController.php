<?php 
	namespace App\Controllers;

	use App\Controllers\Render;
	use Src\Interfaces\InterfaceView;
	use App\Models\User;

	class UserController extends Render implements InterfaceView {
		public function index() {
			header('Location: '.DIRPAGE);
			exit;
		}

		public function edit($id) {
			$data = [];

			$user = new User();

			if (empty($id) || !isset($_SESSION['user']) || $id != $_SESSION['user']['id']) {
				header('Location: '.DIRPAGE);
				exit;
			}

			$this -> setDir('EditUser');
			$this -> setTitle('Forum - Editar perfil');
			$this -> setDescription('Edite seu perfil.');
			$this -> setKeywords('forum, dev, editar perfil, perfil');

			$data['user'] = $user -> getInfo($id);

			$this -> renderLayout($data);
		}
	}