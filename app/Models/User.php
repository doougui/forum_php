<?php 
	namespace App\Models;

	use App\Models\Connection;

	class User extends Connection {
		public function getInfo($id) {
			$sql = "SELECT * FROM user WHERE id = :id";
			$sql = $this -> db -> prepare($sql);
			$sql -> bindParam(":id", $id, \PDO::PARAM_INT);
			$sql -> execute();

			if ($sql -> rowCount() > 0) {
				return $sql -> fetch();
			} else {
				return [];
			}
		}

		public function login($email, $password) {
			$sql = "SELECT * FROM user 
							WHERE email = :email";
			$sql = $this -> db -> prepare($sql);
			$sql -> bindParam(":email", $email, \PDO::PARAM_STR);
			$sql -> execute();

			if ($sql -> rowCount() > 0) {
				$user = $sql -> fetch();

				if (password_verify($password, $user['password'])) {
					$_SESSION['user'] = $user;
					return true;
				} else {
					return false;
				}
			}
		}

		public function register($name, $email, $password, $sex) {
			if ($this -> emailExists($email)) {
				return false;
			} else {
				$sql = "INSERT INTO user 
								(name, email, password, sex) 
								VALUES 
								(:name, :email, :password, :sex)";
				$sql = $this -> db -> prepare($sql);
				$sql -> bindParam(":name", $name, \PDO::PARAM_STR);
				$sql -> bindParam(":email", $email, \PDO::PARAM_STR);
				$sql -> bindParam(":password", $password, \PDO::PARAM_STR);
				$sql -> bindParam(":sex", $sex, \PDO::PARAM_STR);
				$sql -> execute();

				if ($sql -> rowCount() > 0) {
					$user_id = $this -> db -> lastInsertId();

					$sql = "SELECT * FROM user WHERE id = :user_id";
					$sql = $this -> db -> prepare($sql);
					$sql -> bindValue(':user_id', $user_id);
					$sql -> execute();

					$_SESSION['user'] = $sql -> fetch();
				}

				return true;
			}
		}

		public function editUser($id, $name, $email, $password, $sex) {
			$pass = '';
			if (!empty($password)) {
				$pass = ', password = :password';
			}

			$sql = "UPDATE user 
							SET name = :name, email = :email, sex = :sex".$pass." WHERE id = :id";
			$sql = $this -> db -> prepare($sql);
			$sql -> bindParam(":name", $name, \PDO::PARAM_STR);
			$sql -> bindParam(":email", $email, \PDO::PARAM_STR);
			$sql -> bindParam(":sex", $sex, \PDO::PARAM_STR);
			$sql -> bindParam(":id", $id, \PDO::PARAM_INT);

			if (!empty($password)) {
				$sql -> bindParam(":password", $password, \PDO::PARAM_STR);
			}

			$sql -> execute();

			if ($sql -> rowCount() > 0) {
				return true;
			} else {
				return false;
			}
		}

		private function emailExists($email) {
			$sql = "SELECT id FROM user 
							WHERE email = :email";
			$sql = $this -> db -> prepare($sql);
			$sql -> bindParam(":email", $email, \PDO::PARAM_STR);
			$sql -> execute();

			if ($sql -> rowCount() > 0) {
				return true;
			} else {
				return false;
			}
		}
	}