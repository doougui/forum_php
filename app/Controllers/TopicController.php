<?php 
	namespace App\Controllers;

	use App\Controllers\Render;
	use Src\Interfaces\InterfaceView;
	use App\Models\Forum;
	use App\Models\Topic;
	use App\Models\Post;

	class TopicController extends Render implements InterfaceView {
		public function index() {
			header('Location: '.DIRPAGE);
			exit;
		}

		public function open($id) {
			$data = [];

			$topic = new Topic();
			$post = new Post();

			$this -> setDir('Topic');
			$this -> setTitle('Forum - Tópico');
			$this -> setDescription('Visualizar tópico {$id}');
			$this -> setKeywords('forum, topico');

			if (!empty($id) && !empty($topic -> getTopic($id))) {
				$data['topic'] = $topic -> getTopic($id);
				$data['posts'] = $post -> getPosts($id);
			} else {
				header('Location: '.DIRPAGE);
				exit;
			}

			$this -> renderLayout($data);
		}

		public function new() {
			$data = [];

			$forum = new Forum();

			if (!isset($_SESSION['user'])) {
				header('Location: '.DIRPAGE);
				exit;
			}

			$this -> setDir('NewTopic');
			$this -> setTitle('Forum - Criar tópico');
			$this -> setDescription('Crie um novo tópico');
			$this -> setKeywords('forum, topico, novo, novo topico');

			$data['forums'] = $forum -> getForums();

			$this -> renderLayout($data);
		}

		public function edit($id) {
			$data = [];

			$topic = new Topic();
			$forum = new Forum();

			$this -> setDir('EditTopic');
			$this -> setTitle('Forum - Editar tópico');
			$this -> setDescription('Editar tópico');
			$this -> setKeywords('forum, topico, editar, editar topico');

			if (!empty($id) && !empty($topic -> getTopic($id))) {
				$data['forums'] = $forum -> getForums();
				$data['topic'] = $topic -> getTopic($id);

				if (!isset($_SESSION['user']) ||
						$data['topic']['id_author'] != $_SESSION['user']['id']) 
				{
					header('Location: '.DIRPAGE);
					exit;
				}
			} else {
				header('Location: '.DIRPAGE);
				exit;
			}

			$this -> renderLayout($data);
		}

		public function delete($id) {
			$data = [];

			$topic = new Topic();

			if (!empty($id) && !empty($topic -> getTopic($id))) {
				$data['topic'] = $topic -> getTopic($id);

				if (isset($_SESSION['user']) && 
						$data['topic']['id_author'] == $_SESSION['user']['id']) 
				{
					$topic -> deleteTopic($id);
				}
			}

			header('Location: '.DIRPAGE);
			exit;
		}

		public function reply($id) {

			$topic = new Topic();
			$post = new Post();

			if (isset($_SESSION['user']) && !empty($id) && !empty($topic -> getTopic($id))) {
				if (isset($_POST['reply'])) {
					$reply = $_POST['reply'];
					$post -> reply($id, $reply);
				}
			}

			header('Location: '.DIRPAGE."topic/open/{$id}");
			exit;
		}
	}