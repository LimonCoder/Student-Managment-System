<?php 
	session_start();
	require_once('../Config/oopconfig.php'); 
	require_once('../Config/Config.php'); 
	$_SESSION['login'] = "log";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/log.js" ></script>
<!--===============================================================================================-->
	<style type="text/css">
		a:hover{
			color: red;
		}
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpeg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					 Profile
				</span>
				<div id="myalert" class="alert alert-success collapse">
					<strong>Success !</strong> Login Successfully
				</div>
				<div id="alertdanger" class="alert alert-danger collapse">
					<strong>Invalid</strong> Email & Password Invaild  !!
				</div>
				<form action="" method="POST" class="login100-form validate-form p-b-33 p-t-5" >

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" id="username" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" id="pass" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<input type="submit" class="login100-form-btn " name="Submit"  value="Login"  style="cursor: pointer;" >
					</div>

					<a href="registation.php" style=" display: inline-block;
					 margin-top : 17px; margin-left: 5px; font-weight: bold; font-size: 14px;  "> Create an Account </a>
					

				</form>
			</div>
		</div>
	</div>

	

	<div id="dropDownSelect1"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	

	
	

 <?php 


 if (isset($_POST['Submit'])) {

	// Database Connecting....
 	$con = mysqli_connect("localhost", "root", "","userregistration");

 	if (!$con) {
 		die("Database Connection Faild");
 	}

 	//User Value Getting
 	$name = $_POST['username'];
 	$password = $_POST['pass'];

 	// Database Name Query ..
 	$queryname = "SELECT * FROM user_info WHERE Name = '$name'";
 	// Database Password Query..
 	$querypassword = "SELECT * FROM user_info WHERE password = '$password'";

 	// Database Name Query Exixts..
 	$resultsName = mysqli_query($con,$queryname);

 	// Database Password Query Exixts..
 	$resultsPass = mysqli_query($con,$querypassword);
 	// Database Name Count row
 	$Namerow = mysqli_num_rows($resultsName);
 	// Database Password Count row
 	$Passrow = mysqli_num_rows($resultsPass);

 	if ($Namerow == 1 && $Passrow == 1 ){ 

 			$_SESSION['value'] = true;
 		?>

 		<script type="text/javascript">
 			$(document).ready(function(){

 				$("#myalert").show();
 				setTimeout(function(){
 					$("#myalert").hide();
 				},1000);

 				setTimeout(function(){
 					window.open("../Index.php","_self");
 				},2000);
 			});
 		</script>

 		
 	<?php 	}else{ ?>


 		<script type="text/javascript">
 			$(document).ready(function(){

 				$("#alertdanger").show();

 				setTimeout(function(){
 					$("#alertdanger").hide();
 				},2000);
 			});
 		</script>


 	<?php 	}
 	
 } 	

?>	


	


</body>
</html>




