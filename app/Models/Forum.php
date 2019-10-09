<?php 
	namespace App\Models;

	use App\Models\Connection;

	class Forum extends Connection {
		public function getForums() {
			$sql = "SELECT * FROM forum";
			$sql = $this -> db -> query($sql);

			if ($sql -> rowCount() > 0) {
				return $sql -> fetchAll();
			} else {
				return [];
			}
		}

		public function getForum($id) {
			$sql = "SELECT * FROM forum 
							WHERE id = :id";
			$sql = $this -> db -> prepare($sql);
			$sql -> bindParam(":id", $id, \PDO::PARAM_INT);
			$sql -> execute();

			if ($sql -> rowCount() > 0) {
				return $sql -> fetch();
			} else {
				return [];
			}
		}
	}