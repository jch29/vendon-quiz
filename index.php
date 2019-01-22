<?php include 'inc/database.inc.php' ?>
<?php include 'inc/test.inc.php' ?>
<?php include 'inc/header.php' ?>

<?php
	$test = new ViewTest();
	
?>

	<div class="panel-body" >
		
		<form action="test.php" id="testForm" method="POST">
			<div class="from-group">
				<label for="name">Full name</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Name, Surname">
			</div>
			<div class="from-group">
				<label for="test">Choose a quiz</label>
				<select type="text" class="form-control" name="test" id="test">
					<option selected="" disabled="" hidden="" value="0">-Select-</option>
					<?php $test->showAllTests(); ?>
				</select>
			</div>
			<br>
			<div class="from-group">
			<input type="submit" class="btn btn-primary" value="Start">
			</div>
		</form>
	</div>
	<script type="text/javascript">
		/* testForm validation */
		$("#testForm").submit(function(e){
			if($("#test").val() == 0 || $("#name").val() == "")
			{
				alert("You have to input your name and select the test");
				return false;
			}
	  	});
	</script>
<?php include 'inc/footer.php' ?>