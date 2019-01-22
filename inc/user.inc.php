<?php 

class User extends Database {
	
	public function addUser($name) {

		$sql = "SELECT id FROM users where name = '$name' ";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0) {
			return false;
		}

		$sql = "INSERT INTO users (name) VALUES ('$name')";
		$result = $this->connect()->query($sql);
		return true;
	}

	public function getUserId($name) {

		$sql = "SELECT id FROM users where name = '$name' ";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data[0]['id'];
		}

		
	}

	public function getUserName($id) {

		$sql = "SELECT name FROM users where id = '$id' ";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data[0]['name'];
		}

		
	}
}

