<?php 

class Submission extends Database {

	public function addSubmission($user_id, $test_id, $quiz_id, $ans_id, $is_correct, $attempt_id) {
		$sql = "INSERT INTO submission (user_id, test_id, question_id, answer_id, is_answer_correct, attempt_id) VALUES ('$user_id', '$test_id', '$quiz_id', '$ans_id', '$is_correct' , '$attempt_id')";
		$result = $this->connect()->query($sql);
		return true;
	}

	public function getCorrectCount($user_id, $test_id, $attempt_id) {
		$sql = "SELECT id FROM submission where user_id = '$user_id' and test_id = '$test_id' and is_answer_correct=1 and attempt_id = '$attempt_id'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return count($data);
		}
		return 0;
	}

	public function getAttemptId($user_id, $test_id) {
		$sql = "SELECT max(attempt_id) as 'max' FROM submission where user_id = '$user_id' and test_id = '$test_id'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data[0]['max'] + 1;
		}
		return 0;
	}
}

