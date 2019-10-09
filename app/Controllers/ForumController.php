<?php 
	namespace App\Controllers;

	use App\Controllers\Render;
	use Src\Interfaces\InterfaceView;
	use App\Models\Forum;
	use App\Models\Topic;
	use App\Models\Post;

	class ForumController extends Render implements InterfaceView {
		public function index() {
			header('Location: '.DIRPAGE);
			exit;
		}

		public function open($id = NULL) {
			$data = [];

			$forum = new Forum();			
			$topic = new Topic();
			$post = new Post();

			if (empty($id)) {
				header('Location: '.DIRPAGE);
				exit;
			}

			$this -> setDir('Forum');
			$this -> setTitle('Forum - Listagem');
			$this -> setDescription('Listagem de tópicos');
			$this -> setKeywords('forum, dev, topicos, forums');

			$data['forum'] = $forum -> getForum($id);

			if (count($data['forum']) == 0) {
				header('Location: '.DIRPAGE);
			}

			$data['topics'] = $topic -> getTopics($id);
			$data['qt_replies'] = $post -> getQtReplies();

			$this -> renderLayout($data);
		}
	}