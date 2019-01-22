<?php 

class Test extends Database {
	
	public function getAllTests() {
		$sql = "SELECT * FROM tests";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
}

class ViewTest extends Test {
	
	public function showAllTests() {
		$datas = $this->getAllTests();
		foreach ($datas as $data) {
			echo "<option value='" . $data['id'] . "'>" . $data['title'] . "</option>";
		}
	}	
}