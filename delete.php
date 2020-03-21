<?php 
	
	$id = $_GET['id'];

	$con = mysqli_connect("localhost","root","","sms");

	$query = "SELECT * FROM student_info WHERE SL = $id";

	$results = mysqli_query($con,$query);

	$row = mysqli_fetch_assoc($results);


	if (file_exists($row['Image'])) {
		unlink($row['Image']);
	}



	if (!$con) {
		die("connection Faild");
	}

	$query = "DELETE FROM student_info WHERE SL = $id";

	if (!mysqli_query($con,$query)) {
		die("faild");
	}


	header("location: Index.php");


 ?>