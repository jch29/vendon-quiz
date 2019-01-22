<?php include 'inc/database.inc.php' ?>
<?php include 'inc/quiz.inc.php' ?>
<?php include 'inc/answer.inc.php' ?>
<?php include 'inc/submission.inc.php' ?>
<?php 
	$quizObj = new Quiz(); 
	$answerObj = new Answer(); 
	$subObj = new Submission();
	$page = $_POST['page'];
	$test = $_POST['test'];
	$answer = $_POST['answer'];
	$attempt_id = $_POST['attempt_id'];
	$quizs = $quizObj->getAllQuizs($test);
	$total_count = $quizObj->getQuizCountForTest($test);

	
	/* save a new row to submission table */
	if($page > 1) // when the problems are submitted
	{
		$save_id = $quizs[$page-2]['id'];
		$is_correct = $answerObj->isCorrect($save_id, $answer);
		
		$subObj->addSubmission($_POST['user_id'], $_POST['test'], $save_id, $answer, $is_correct, $attempt_id);
	}
	else /* get user's attempt_id */
	{
		$attempt_id = $subObj->getAttemptId($_POST['user_id'], $_POST['test']);
	}

	/* check if all the problems are passed, if so go to final page
	 */
	if($page == $total_count + 1)
	{
		echo "finished";
		return;
	}
	
	/* get the next page information ( problem and answers) */
	$quiz_id = $quizs[$page-1]['id'];
	$quiz = $quizObj->getQuiz($quiz_id);
	$percent = round(($page-1) * 100 / $total_count);

	$answers = $answerObj->getAnswersForTest($quiz['id']);
	
?>
	<div class="current">Question <?=$page?> to <?=$total_count?></div>
	<p class="question">
		
		<?=$quiz['title']?>
	</p>

	<div class="row">
		<?php foreach($answers as $a) { ?>
		<div class="col-md-6">
		<input type="button" class="row col-md-6 btn btn-default choice" value="<?=$a['title']?>" rowid="<?=$a['id']?>">
		</div>
		<?php } ?>
	</div>
	<input type="hidden" id="answer" name="answer" value="">
	<input type="hidden" id="page_num" value="<?=$page?>">
	<input type="hidden" id="total_pages" value="<?=$total_count?>">
	<input type="hidden" id="attempt_id" value="<?=$attempt_id?>">
	<input type="hidden" id="user_id" value="<?=$_POST['user_id']?>">
	<div class="row">
		<div class="progress ">
		  <div class="progress-bar" role="progressbar" aria-valuenow="<?=$percent?>"
		  aria-valuemin="0" aria-valuemax="100" style="width:<?=$percent?>%">
		  </div>
		</div>
	</div>
	<script type="text/javascript">
		/* change the state of the choice button */
		$(".choice").click(function(){
			$(".choice").removeClass("selected");
			$(this).addClass("selected");
			var answer = $(this).attr('rowid');
			
			$("#answer").val(answer);
		})
	</script>
