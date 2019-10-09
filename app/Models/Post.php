<?php 
	namespace App\Models;

	use App\Models\Connection;

	class Post extends Connection {
		public function getPosts($id) {
			$sql = "SELECT *, user.name as user
							FROM post 
							INNER JOIN user
							ON post.id_author = user.id
							WHERE id_topic = :id
							ORDER BY msg_date DESC";
			$sql = $this -> db -> prepare($sql);
			$sql -> bindParam(":id", $id, \PDO::PARAM_INT);
			$sql -> execute();

			if ($sql -> rowCount() > 0) {
				return $sql -> fetchAll();
			} else {
				return [];
			}
		}

		public function getQtReplies() {
			$sql = "SELECT 
							id_topic, COUNT(*) as count 
							FROM post 
							GROUP BY id_topic";
			$sql = $this -> db -> query($sql);

			if ($sql -> rowCount() > 0) {
				return $sql -> fetchAll();
			} else {
				return [];
			}
		}

		public function reply($id, $reply) {
			$sql = "INSERT INTO post 
							(id_topic, id_author, msg) 
							VALUES 
							(:id_topic, :id_author, :reply)";
			$sql = $this -> db -> prepare($sql);
			$sql -> bindParam(":id_topic", $id, \PDO::PARAM_INT);
			$sql -> bindParam(":id_author", $_SESSION['user']['id'], \PDO::PARAM_INT);
			$sql -> bindParam(":reply", $reply, \PDO::PARAM_STR);
			$sql -> execute();
		}
	}