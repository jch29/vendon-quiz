<?php 
	
	$name = $_POST['name'];
	$sql = "INSERT INTO users (name) VALUES ('$name');";
	mysql_query($conn, $sql);

	header("Location: ../test.php");