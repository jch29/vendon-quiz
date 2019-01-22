<?php 

class Answer extends Database {

	public function getAnswersForTest($quiz_id) {
		$sql = "SELECT * FROM answers where question_id = '$quiz_id' ";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function isCorrect($quiz_id, $answer_id) {
		$sql = "SELECT * FROM answers where id = '$answer_id'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data[0]['is_correct'];
		}
	}
}

