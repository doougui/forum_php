<?php 
	namespace App\Models;

	use App\Models\Connection;

	class Category extends Connection {
		public function getCategories() {
			$sql = "SELECT * FROM category";
			$sql = $this -> db -> query($sql);

			if ($sql -> rowCount() > 0) {
				return $sql -> fetchAll();
			} else {
				return [];
			}
		}
	}