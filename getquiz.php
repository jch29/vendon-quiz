<?php include 'inc/database.inc.php' ?>
<?php include 'inc/quiz.inc.php' ?>
<?php include 'inc/answer.inc.php' ?>
<?php 
	$quizObj = new Quiz(); 
	$answerObj = new Answer(); 
	$page = $_POST['page'];
	$test = $_POST['test'];

//	$quiz_id = $_GET['quiz_id'];
	
	$quizs = $quizObj->getAllQuizs($test);

	$quiz_id = $quizs[$page-1]['id'];
	$quiz = $quizObj->getQuiz($quiz_id);

	$total_count = $quizObj->getQuizCountForTest($test);

	$answers = $answerObj->getAnswersForTest($quiz['id']);
	
?>
	<div class="current">Question <?=$page?> to <?=$total_count?></div>
	<p class="question">
		
		<?=$quiz['title']?>
	</p>

	<ul class="choises">
		<?php foreach($answers as $a) { ?>
		<li><input type="radio" name="choice" value="<?=$a['id']?>"> <?=$a['title']?> </li>
		<input type="button" class="btn btn-default choice" value="<?=$a['title']?>" rowid="<?=$a['id']?>">
		<?php } ?>
	</ul>

	<input type="hidden" id="answer" name="answer" value="">
	<input type="hidden" id="page_num" value="<?=$page?>">
	<input type="hidden" id="total_pages" value="<?=$total_count?>">
	<input type="hidden" id="user_id" value="<?=$_POST['user_id']?>">

	<script type="text/javascript">
		$(".choice").click(function(){
			$(".choice").removeClass("selected");
			$(this).addClass("selected");
			var answer = $(this).attr('rowid');
			console.log(answer);
			$("#answer").val(answer);
		})
	</script>
