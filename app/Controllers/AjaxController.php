<?php 
	namespace App\Controllers;

	use App\Models\User;
	use App\Models\Topic;

	class AjaxController {
		public function login() {
			unset($_SESSION['user']);

			$user = new User();

			if (isset($_POST['email']) && isset($_POST['password'])) {
				if (filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)) {
					$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);  
				} else {
					echo "Insira um e-mail válido para continuar.";
					exit;
				}

				$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS); 

				if (!empty($email) && !empty($password)) {
					if ($user -> login($email, $password)) {
						return true;
					} else {
						echo "Usuário e/ou senha incorretos.";
					}
				} else {
					echo "Preencha todos os campos para continuar.";
				}
			} else {
				echo "Preencha todos os campos para continuar.";
			}
		}

		public function register() {
			unset($_SESSION['user']);

			$user = new User();

			if (isset($_POST['name']) && !empty($_POST['name']) &&
					isset($_POST['email']) && !empty($_POST['email']) &&
					isset($_POST['password']) && !empty($_POST['password']) &&
					isset($_POST['sex']) && !empty($_POST['sex']))
			{
				if (filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)) {
					$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS); 
				} else {
					echo "Insira um e-mail válido para continuar.";
					exit;
				}

				$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
				$password = password_hash(
					filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS), 
					PASSWORD_DEFAULT
				);

				if (!empty($_POST['sex']) && 
						$_POST['sex'] == 'M' || 
						$_POST['sex'] == 'F' || 
						$_POST['sex'] == 'U')
				{
					$sex = $_POST['sex'];
				} else {
					echo "Sexo inválido!";
					exit;
				}

				if ($user -> register($name, $email, $password, $sex)) {
					return true;
				} else {
					echo "Usuário já cadastrado. <a href='".DIRPAGE."login'>Faça seu login.</a>";
				}
			} else {
				echo "Preencha todos os campos para continuar.";
			}
		}

		public function editUser() {
			$user = new User();

			if (isset($_POST['id']) && !empty($_POST['id']) &&
					isset($_POST['name']) && !empty($_POST['name']) &&
					isset($_POST['email']) && !empty($_POST['email']) &&
					isset($_POST['sex']) && !empty($_POST['sex']))
			{
				if (filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)) {
					$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS); 
				} else {
					echo "Insira um e-mail válido para continuar.";
					exit;
				}

				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
				$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

				if (isset($_POST['password']) && !empty($_POST['password'])) {
					$password = password_hash(
						filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS), 
						PASSWORD_DEFAULT
					);
				} else {
					$password = '';
				}

				if (!empty($_POST['sex']) && 
						$_POST['sex'] == 'M' || 
						$_POST['sex'] == 'F' || 
						$_POST['sex'] == 'U')
				{
					$sex = $_POST['sex'];
				} else {
					echo "Sexo inválido!";
					exit;
				}

				if ($user -> editUser($id, $name, $email, $password, $sex)) {
					return true;
				} else {
					echo "Não foi possível atualizar as informações.";
				}
			} else {
				echo "Todos os campos devem estar preenchidos.";
			}
		}

		public function newTopic() {
			$topic = new Topic();

			if (isset($_POST['title']) && !empty($_POST['title']) &&
					isset($_POST['forum']) && !empty($_POST['forum']) &&
					isset($_POST['text']) && !empty($_POST['text']))
			{
				$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS); 
				$forum = filter_input(INPUT_POST, 'forum', FILTER_SANITIZE_SPECIAL_CHARS);
				$text = $_POST['text'];

				if ($topic -> createNewTopic($title, $forum, $text)) {
					return true;
				} else {
					echo "Não foi possível postar o tópico.";
				}
			} else {
				echo "Preencha todos os campos para continuar.";
			}
		}

		public function editTopic() {
			$topic = new Topic();

			if (isset($_POST['id']) && !empty($_POST['id']) &&
					isset($_POST['title']) && !empty($_POST['title']) &&
					isset($_POST['forum']) && !empty($_POST['forum']) &&
					isset($_POST['text']) && !empty($_POST['text']))
			{
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS); 
				$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS); 
				$forum = filter_input(INPUT_POST, 'forum', FILTER_SANITIZE_SPECIAL_CHARS);
				$text = $_POST['text'];

				if ($topic -> editTopic($id, $title, $forum, $text)) {
					return true;
				} else {
					echo "Não foi possível editar o tópico.";
				}
			} else {
				echo "Todos os campos devem estar preenchidos.";
			}
		}
	}