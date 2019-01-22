<?php include 'inc/database.inc.php' ?>
<?php include 'inc/quiz.inc.php' ?>
<?php include 'inc/answer.inc.php' ?>
<?php include 'inc/submission.inc.php' ?>
<?php include 'inc/user.inc.php' ?>
<?php include 'inc/header.php' ?>

<?php 
	$user = new User(); 
	$username = $user->getUserName($_GET['user_id']);
	$subObj = new Submission();
	$correct_count = $subObj->getCorrectCount($_GET['user_id'], $_GET['test'], $_GET['attempt_id']);

	$quizObj = new Quiz(); 
	$total_count = $quizObj->getQuizCountForTest($_GET['test']);
?>
	<div class="container">
		<h1>Thank you, <?=$username ?>!</h1>
		<p>You answered correct to <?=$correct_count ?> from <?=$total_count ?> questions!</p>
		<h2><a class="btn btn-success" href="index.php"> Home </a></h2>
	</div>

<?php include 'inc/footer.php' ?>