<?php 
	namespace App\Models;

	use App\Models\Connection;

	class Topic extends Connection {
		public function getTopics($id) {
			$sql = "SELECT 
							topic.*, user.name as user 
							FROM topic 
							INNER JOIN user 
							ON topic.id_author = user.id 
							WHERE id_forum = :id
							ORDER BY upvotes";
			$sql = $this -> db -> prepare($sql);
			$sql -> bindParam(":id", $id, \PDO::PARAM_INT);
			$sql -> execute();

			if ($sql -> rowCount() > 0) {
				return $sql -> fetchAll();
			} else {
				return [];
			}
		}

		public function getTopic($id) {
			$sql = "SELECT 
							topic.*, user.name as user
							FROM topic 
							INNER JOIN user 
							ON topic.id_author = user.id 
							WHERE topic.id = :id";
			$sql = $this -> db -> prepare($sql);
			$sql -> bindParam(":id", $id, \PDO::PARAM_INT);
			$sql -> execute();

			if ($sql -> rowCount() > 0) {
				return $sql -> fetch();
			} else {
				return [];
			}
		}

		public function getQtTopics() {
			$sql = "SELECT 
							id_forum, COUNT(*) as count 
							FROM topic 
							GROUP BY id_forum";
			$sql = $this -> db -> query($sql);

			if ($sql -> rowCount() > 0) {
				return $sql -> fetchAll();
			} else {
				return [];
			}
		}

		public function createNewTopic($title, $forum, $text) {
			$sql = "INSERT INTO topic 
							(id_forum, id_author, title, content) 
							VALUES 
							(:id_forum, :id_author, :title, :content)";
			$sql = $this -> db -> prepare($sql);
			$sql -> bindParam(":id_forum", $forum, \PDO::PARAM_INT);
			$sql -> bindParam(":id_author", $_SESSION['user']['id'], \PDO::PARAM_STR);
			$sql -> bindParam(":title", $title, \PDO::PARAM_STR);
			$sql -> bindParam(":content", $text, \PDO::PARAM_STR);
			$sql -> execute();

			if ($sql -> rowCount() > 0) {
				$id_topic = $this -> db -> lastInsertId();
				return $id_topic;
			} else {
				return false;
			}
		}

		public function editTopic($id, $title, $forum, $text) {
			$sql = "UPDATE topic 
							SET title = :title, id_forum = :forum, content = :text
							WHERE id = :id";
			$sql = $this -> db -> prepare($sql);
			$sql -> bindParam(":title", $title, \PDO::PARAM_STR);
			$sql -> bindParam(":forum", $forum, \PDO::PARAM_STR);
			$sql -> bindParam(":text", $text, \PDO::PARAM_STR);
			$sql -> bindParam(":id", $id, \PDO::PARAM_INT);
			$sql -> execute();

			if ($sql -> rowCount() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function deleteTopic($id) {
			$sql = "DELETE FROM topic WHERE id = :id";
			$sql = $this -> db -> prepare($sql);
			$sql -> bindParam(":id", $id, \PDO::PARAM_INT);
			$sql -> execute();
		}
	}