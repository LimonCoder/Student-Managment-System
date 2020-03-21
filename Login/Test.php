 <!DOCTYPE html>
 <html>
 <head>
 	<title>login</title>
 </head>
 <body>
 	<div id="myalert" class="alert alert-success collapse">
					<strong>Success !</strong> Login Successfully
				</div>
				<div id="alertdanger" class="alert alert-danger collapse">
					<strong>Invalid</strong> Email & Password Invaild  !!
				</div>
 	<form action="" method="POST">
 		<input type="text" name="username">
 		<input type="password" name="pass">
 		<input type="submit" name="Submit" value="submit">
 	</form>

 </body>
 </html>

 <?php 



 if (isset($_POST['Submit'])) {

		// Database Connecting....
 	$con = new mysqli("localhost","root","", "userregistration");


 	
 	//User Value Getting
 	$name = $_POST['username'];
 	$password = $_POST['pass'];

 	// Database Name Query ..
 	$queryname = "SELECT * FROM user_info WHERE Name = '$name'";
 	// Database Password Query..
 	$querypassword = "SELECT * FROM user_info WHERE password = '$password'";

 	// Database Name Query Exixts..
 	$resultsName = $con->query($queryname);

 	// Database Password Query Exixts..
 	$resultsPass = $con->query($querypassword);
 	// Database Name Count row
 	$Namerow = $resultsName->num_rows;
 	// Database Password Count row
 	$Passrow = $resultsPass->num_rows;

 	

 	if ($Namerow == 1 && $Passrow == 1 )  { 
 		$_SESSION['value'] = true;
 		
 		?>

 		<script type="text/javascript">
 			$(document).ready(function(){

 				$("#myalert").show();
 				setTimeout(function(){
 					$("#myalert").hide();
 				},2000);


 				setTimeout(function(){
 					window.open("../Index.php");
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

<?php }


var_dump($Namerow == 1);
	
}

?>	