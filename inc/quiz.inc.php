<?php 

class Quiz extends Database {
	
	public function getAllQuizs($test_id) {
		$sql = "SELECT id FROM questions where test_id = '$test_id' ";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function getQuiz($quiz_id) {
		$sql = "SELECT * FROM questions where id = '$quiz_id' ";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data[0];
		}
	}

	public function getQuizCountForTest($test_id) {
		$sql = "SELECT COUNT(*) as count FROM questions where test_id = '$test_id' ";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data[0]['count'];
		}
	}
}
