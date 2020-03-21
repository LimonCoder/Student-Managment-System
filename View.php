<?php 

	session_start(); 

	if (!isset($_SESSION['value'])) {
		
		header("location: Login/Login.php");
		
	}
	
	$roll = $_GET['id'];

	$con = mysqli_connect("localhost","root","","sms");

	if ($con) {
		
		$query = "SELECT * FROM student_info WHERE SL = $roll";

		$results =  mysqli_query($con,$query);

		$row = mysqli_fetch_assoc($results);


	}

	
		
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>View</title>
 	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 </head>
 <body>

 	<div class="container ">
 		<div class="row">
 			<a href="Index.php" class="btn btn-success ml-3 mb-2 mt-1">Back</a>
 		</div>
 		<div class="card">
 			<div class="card-header" style="font-weight: bold; font-size: 20px; text-transform: uppercase;" >Student Information</div>
 			<div class="card-body">
 				<div class="row">
 					<div class="col-md-2">
 						<h6>Class :</h6>
 					</div>
 					<div class="col-md-6">
 						<p class="load"><?php echo $row['Class']; ?></p>
 					</div>

 				</div>
 				<hr>
 				<div class="row">
 					<div class="col-md-2">
 						<h6 ">Roll :</h6>
 					</div>
 					<div class="col-md-6">
 						<p class="load"><?php echo $row['Roll']; ?></p>
 					</div>

 				</div>
 				<hr>
 				<div class="row">
 					<div class="col-md-2">
 						<h6 ">Name :</h6>
 					</div>
 					<div class="col-md-6">
 						<p class="load"><?php echo $row['Name']; ?></p>
 					</div>

 				</div>
 				<hr>
 				<div class="row">
 					<div class="col-md-2">
 						<h6 ">Gender :</h6>
 					</div>
 					<div class="col-md-6">
 						<p class="load"><?php echo $row['Gender']; ?></p>
 					</div>

 				</div>
 				<hr>
 				<div class="row">
 					<div class="col-md-2">
 						<h6 ">Age :</h6>
 					</div>
 					<div class="col-md-6">
 						<p class="load"><?php echo $row['Age']; ?></p>
 					</div>

 				</div>
 				<hr>
 				<div class="row">
 					<div class="col-md-2">
 						<h6 ">Number :</h6>
 					</div>
 					<div class="col-md-6">
 						<p class="load"><?php echo $row['Number']; ?></p>
 					</div>

 				</div>
 				<hr>
 				<div class="row">
 					<div class="col-md-2">
 						<h6 ">Address :</h6>
 					</div>
 					<div class="col-md-6">
 						<p class="load"><?php echo $row['Address']; ?></p>
 					</div>

 				</div>
 				<hr>
 				<div class="row">
 					<div class="col-md-2">
 						<h6 ">Session :</h6>
 					</div>
 					<div class="col-md-6">
 						<p class="load"><?php echo $row['Session']; ?></p>
 					</div>

 				</div>
 				<hr>
 				<div class="row">
 					<div class="col-md-2">
 						<h6 ">Shift :</h6>
 					</div>
 					<div class="col-md-6">
 						<p class="load"><?php echo $row['Shift']; ?></p>
 					</div>

 				</div>
 				<hr>
 				<div class="row">
 					<div class="col-md-2">
 						<h6 ">Section :</h6>
 					</div>
 					<div class="col-md-6">
 						<p class="load"><?php echo $row['Section']; ?></p>
 					</div>

 				</div>
 				<hr>
 				<div class="row justify-content-end">
 					<button class="btn btn-success m-2" onclick="window.print()">Print</button>
 				</div>

 			</div>
 		</div>
 	</div>
 	

 	<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 </body>
 </html>