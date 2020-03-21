<?php
	session_start();

	if (!isset($_SESSION['login'])) {
		header("location: Login.php");
	}


// Database Connecting....
 $con =  mysqli_connect("localhost","root","", "userregistration");


// Database Connectivity Check....
 if (!$con) {
 	die("Connection failed: " . $conn->connect_error);
 }


// Form Submited Checking....
if (isset($_POST['Save'])) {

		// Name Validation Checking
	if (!empty($_POST['uname'])) {
		$username = $_POST['uname'];
	}else{
		$emptyname = "*";
	}

		// Email Validation Checking
	if (!empty($_POST['uemail'])) {

		if (filter_var($_POST['uemail'], FILTER_VALIDATE_EMAIL)) {

			$data = $_POST['uemail'];
			$query = "SELECT * FROM user_info WHERE Email = '$data'";
			$results = mysqli_query($con,$query);
			if (mysqli_num_rows($results) > 0) {
				$existemail = "Already Registration this email";
			}else{

				$useremail = $_POST['uemail'];
			}


			
		}else{
			$invalidemail = "Invalid Email";
		}

	}else{
		$emptyemail = "*";
	}

		//Gender Validation Checking
	if (!empty($_POST['Gender'])) {
		$usergender = $_POST['Gender'];
	}else{
		$emptygender = "*";
	}


		// Password Validation Checking

	if (!empty($_POST['passw'])) {

		if (strlen($_POST['passw']) >= 6) {

			$pass = trim($_POST['passw']);

		}else{
			$Invaildpass = "Password must be grather than 6";
		}
	}else{
		$emptypass = "*";
	}

		// Confrim Password Checking

	if (!empty($_POST['cpass'])) {

		if (strlen($_POST['cpass']) >= 6) {

			$Cpass = trim($_POST['cpass']);

		}else{

			$Cinvaildpass = "Password must be grather than 6";
		}
	}else{
		$Cemptypass = "*";
	}

		// Main Password Cheacking....

	if (isset($pass) && isset($Cpass)) {

		if($pass == $Cpass) {
			$mainpass = $pass;
		}else{
			$notmatch = "Password Not Match ";
		}
	}

		


	



}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.con{
			border-radius: 5px;
			-webkit-box-shadow: -4px 10px 11px -1px rgba(0,0,0,0.63);
			-moz-box-shadow: -4px 10px 11px -1px rgba(0,0,0,0.63);
			box-shadow: -4px 10px 11px -1px rgba(0,0,0,0.63);

		}
		.ris{
			width: 600px;
			position: absolute;
			top: 16%;
			left:0%;
			right: 0%;
			bottom: 0%;
			margin: auto;
			padding:15px;
		}
		.bga{
			background-image: url(images/bgris.jpg);
			background-repeat: no-repeat;
			width: 100%;
			height: 100vh;
			background-size: cover;
		}
	</style>
</head>
<body>
	<div class="container-fluid bga">
		<div class="row">
			<div class="col-md-6 offset-md-3">

				<div class="card con mt-5">
					<div id="regis" class="alert alert-success collapse">
						<strong>Success  !</strong> Your Resistration Completely Successfully
					</div>
					<div class="card-header">
						<h3>Registation From</h3>
					</div>
					<div class="card-body">
						<form action="" method="POST">

							<div class="form-group">
								<label for="name">Name :</label>
								<input type="text" class="form-control" id="name" placeholder="user name" name="uname"><?php if (isset($emptyname)) {
									echo "<span style='color: red;'>$emptyname</span>";
								} ?>
							</div>

							<div class="form-group">
								<label for="email">Email :</label>
								<input type="text" class="form-control" id="email" placeholder="name@example.com" name="uemail"><?php 
									if (isset($emptyemail)) {
										echo "<span style='color: red;'>$emptyemail</span>";
									}elseif (isset($invalidemail)) {
										echo "<span style='color: red;'>$invalidemail</span>";
									}elseif (isset($existemail)) {
										echo "<span style='color: red;'>$existemail</span>";
									}

								 ?>
							</div>
							<div class="form-group">
								<label for="gender">Gender :</label>
								<input type="radio"  name="Gender" value="male">Male
								<input type="radio"  name="Gender" value="famale">Famale
								<?php 
									if (isset($emptygender)) {
										echo "<span style='color: red;'>$emptygender</span>";
									}
								 ?>
							</div>
							<div class="form-group">
								<label for="pass">Password :</label>
								<input type="password" class="form-control" id="pass" placeholder="create new passwrod" name="passw">
								<?php 
									if (isset($emptypass)) {
										echo "<span style='color: red;'>$emptypass</span>";
									}elseif (isset($Invaildpass)) {
										echo "<span style='color: red;'>$Invaildpass</span>";
									}
								 ?>
							</div>
							<div class="form-group">
								<label for="conf">Confirm Password :</label>
								<input type="password" class="form-control" id="conf" placeholder="confirm Password" name="cpass">
								<?php 
									if (isset($Cemptypass)) {
										echo "<span style='color: red;'>$Cemptypass</span>";
									}elseif (isset($Cinvaildpass)) {
										echo "<span style='color: red;'>$Cinvaildpass</span>";
									}elseif (isset($notmatch)) {
										echo "<span style='color: red;'> $notmatch</span>";
									}
								 ?>
							</div>

						</div>
						<div class="card-footer">
							<div class="row justify-content-end">
								<input type="submit" class="btn btn-primary px-3 py-1" name="Save" value="save" >

								<input type="reset" class=" btn btn-primary px-3 py-1 ml-2" name="reset" value="reset">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php 
	// Variable Set Checking.....
	if (isset($username) && isset($useremail) && isset($usergender) && isset($mainpass)) {

			echo $username;
			echo $useremail;
			echo $usergender;
			echo $mainpass;
		// Mysqli Value Insert Query....
		$sqli = "INSERT INTO user_info VALUES (NULL, '$username', '$useremail', '$usergender', '$mainpass')";

		//Mysqli Value Insert Checking.......
		if (mysqli_query($con,$sqli)) { ?>
				
				<script type="text/javascript">
					$(document).ready(function(){
						$("#regis").show();
					});

					setTimeout(function(){
						$("#regis").hide();
					},1000);

					<?php unset($_SESSION['login']); ?>

					setTimeout(function(){
						window.open("Login.php","_self");
					},2000);


				</script>

	<?php	}else{
			echo "Data Insert Faild";
		}

		
	}





	?>

</body>
</html>