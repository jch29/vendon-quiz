<?php include 'inc/database.inc.php' ?>
<?php include 'inc/quiz.inc.php' ?>
<?php include 'inc/user.inc.php' ?>
<?php include 'inc/header.php' ?>

<?php 
	/* get user name and user id */
	$user = new User(); 
	$user->addUser($_POST['name']);
	$user_id = $user->getUserId($_POST['name']);
?>
	<div class="container">
		<div id="problemBox">

			
		</div>
		<input type="button" class="btn btn-primary" name="next" id="btn_next" value="Next">
	</div>
	<script type="text/javascript">
		/* on page load, show the first problem */
		$.post("process.php", {user_id : <?=$user_id?>, test : <?=$_POST['test']?> , page : 1, answer: 0, attempt_id : 1 }, function(data){
			
			$("#problemBox").html(data);
		});
		/* when press the next button , show the next problem */
		$("#btn_next").click(function(){
			var page = parseInt($("#page_num").val()) + 1;
			/* when you didn't select a choice, you can't go to next page */
			if($("#answer").val() == "")
			{
				alert("You should select the answer");
				return ;
			}
			/* get the next problem information */
			$.post("process.php", {user_id : <?=$user_id?>, test : <?=$_POST['test']?> , page : page, answer: $("#answer").val(), attempt_id : $("#attempt_id").val() }, function(data){
				if(data == "finished")
				{
					window.location.href = "final.php?user_id=" + "<?=$user_id?>" + "&test=" + "<?=$_POST['test']?>" + "&attempt_id=" + $("#attempt_id").val() ;
				}
				$("#problemBox").html(data);
			});

	  	});
	</script>
<?php include 'inc/footer.php' ?>