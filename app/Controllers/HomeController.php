<?php 
	namespace App\Controllers;

	use App\Controllers\Render;
	use Src\Interfaces\InterfaceView;
	use App\Models\Category;
	use App\Models\Forum;
	use App\Models\Topic;

	class HomeController extends Render implements InterfaceView {
		public function index() {
			$data = [];

			$category = new Category();
			$forum = new Forum();
			$topic = new Topic();

			$this -> setDir('Home');
			$this -> setTitle('Forum - Home');
			$this -> setDescription('Home do forum.');
			$this -> setKeywords('forum, dev');

			$data['categories'] = $category -> getCategories();
			$data['forums'] = $forum -> getForums();
			$data['qt_topics'] = $topic -> getQtTopics();

			$this -> renderLayout($data);
		}
	}