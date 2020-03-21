<?php 

session_start(); 

if (!isset($_SESSION['value'])) {
	
	header("location: Login/Login.php");
	
}


$Sl_no = $_GET['id'];
$con = mysqli_connect("localhost","root","","sms");

if ($con) {
	$query = "SELECT * FROM student_info WHERE SL = $Sl_no";
	$results = mysqli_query($con,$query);
	if ($results) {

		$info = mysqli_fetch_assoc($results);

	}else
	{
		echo "Connnection Faild";
	}
}else
{
	echo "Database Faild";
}



if (isset($_POST['Save'])) {

	

	if (!empty($_POST['Roll'])) {

		if (is_numeric($_POST['Roll'])) {

			$Roll = $_POST['Roll'];

		}else{
			$errRoll = "Roll isn't Valid";
		}

	}else
	{
		$emptyRoll = "*";
	}


	if (!empty($_POST['StudentName'])) {
		$StudentName = $_POST['StudentName'];
	}else
	{
		$errName = "*";
	}


	if (!empty($_POST['StudentAge'])) {

		if (is_numeric($_POST['StudentAge'])) {

			$Age = $_POST['StudentAge'] ;
		}else {
			$Invaildage = "Age is't Valid";
		}
		
	}else{
		$errage = "*";
	}

	if (!empty( $_POST['StudentGender'])) {
		$Gender = $_POST['StudentGender'];
	}else
	{
		$errgender = "*";
	}

	if (!empty($_POST['StudentMobileNo'])) {
		
		if (is_numeric($_POST['StudentMobileNo'])) {
			
			if (strlen($_POST['StudentMobileNo']) >= 10) {
				$MobileNumber = $_POST['StudentMobileNo'];
			}else{
				$invalidNumber = "Invaild Number";
			}
		}else{
			$InvaildtypeNumber = "Number is Mustbe Integer";
		}
	}else{
		$emptyNumber ="*";
	}

	if (!empty($_POST['StudentAddress'])) {
		$Studentadres = $_POST['StudentAddress'];
	}else{
		$erraddress = "*";
	}

	if ($_POST['Class'] != "Select Class") {

		$Class = $_POST['Class'];

	}else{
		$errclass = "*";
	}

	if ($_POST['Session'] != "Select Session Year") {
		$Session = $_POST['Session'];
	}
	if ($_POST['shift'] != "Select Shift") {
		$Shift = $_POST['shift'];
	}
	if ($_POST['Section'] != "Select Section") {
		$Section = $_POST['Section'];
	}


	

	
}


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	
	<div class="jumbotron">
		
		<div class="row justify-content-center">

			<div class="col-sm-10">
				<div class="row justify-content-end">
					<a href="Index.php" class="btn btn-primary mr-3 mb-2 "  >Student List</a>
				</div>
				<div id="myalert" class="alert alert-success collapse">
					<strong>Success!</strong> Data Update Successfully .
				</div>
				<div class="card">
					<div class="card-header">Student Addmission Update</div>
					<div class="card-body">
						<form action="" method="POST">

							<div class="card">
								<div class="card-header">Personal Information</div>
								<div class="card-body px-4">
									<div class="row form-group">
										<label class="col-md-3" for="roll">Roll No :
											<?php if (isset($emptyRoll)) {
												echo "<span style='color: red;font-size: 15px; '>$emptyRoll</span>";
											}elseif (isset($errRoll)) {
												echo "<span style='color: red;font-size: 15px;' >$errRoll</span>";
											} 

											?>
											
										</label>
										<input type="text" class="form-control col-md-9" id="roll" name="Roll" value="<?php echo $info['Roll']  ?>" >
									</div>
									<div class="row form-group">
										<label class="col-md-3" for="name">Name :
											<?php 
											if (isset($errName)) {
												echo "<span style='color: red;font-size: 15px;' >$errName</span>";
											}
											?>
										</label>
										<input type="text" class="form-control col-md-9" id="name" name="StudentName" value="<?php echo $info['Name']  ?>"  >
									</div>
									<div class="row form-group">
										<label class="col-md-3" for="Age">Age :
											<?php if (isset($errage)) {
												echo "<span style='color: red;font-size: 15px;' >$errage</span>";
											}elseif (isset($Invaildage)) {
												echo "<span style='color: red;font-size: 15px;' >$Invaildage</span>";
											} ?>
										</label>
										<input type="text" class="form-control col-md-9" id="Age" name="StudentAge" value="<?php echo $info['Age']  ?>"  >
									</div>
									<div class="row form-group">
										<label class="col-md-3" >Gender :
											<?php 
											if (isset($errgender)) {
												echo "<span style='color: red;font-size: 15px;' >$errgender</span>";
											}
											?>
										</label>
										<div class="radio">
											<input type="radio" id="male"  name="StudentGender" value="male" >Male
											<input type="radio" id="famale"   class="ml-2"  name="StudentGender"  value="famale" >Famale

											<script>

												<?php 
												if ($info['Gender'] == "male") { ?>
													document.getElementById("male").checked = true;
												<?php	}elseif ($info['Gender'] == "famale") { ?>

													document.getElementById("famale").checked = true;

												<?php		}

												?>


											</script>


										</div>
									</div>
									<div class="row form-group">
										<label class="col-md-3" for="mobile">Mobile No :
											<?php 
											if (isset($emptyNumber)) {
												echo "<span style='color: red;font-size: 15px;' >$emptyNumber</span>";
											}elseif (isset($InvaildtypeNumber)) {
												echo "<span style='color: red;font-size: 15px;' >$InvaildtypeNumber</span>";
											}elseif (isset($invalidNumber)) {
												echo "<span style='color: red;font-size: 15px;' >$invalidNumber</span>";
											}

											?>

										</label>
										<input type="text" class="form-control col-md-9" id="mobile" name="StudentMobileNo" value="<?php echo $info['Number']  ?>"  >
									</div>
									<div class="row form-group">
										<label class="col-md-3" for="address">Address :
											<?php 
											if (isset($erraddress)) {
												echo "<span style='color: red;font-size: 15px;' >$erraddress</span>";
											}
											?>
										</label>
										<input type="text" class="form-control col-md-9" id="address" name="StudentAddress" value="<?php echo $info['Address']  ?>"  >
									</div>

								</div>
							</div>
							<div class="card mt-2">
								<div class="card-header">Academic Information</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<div class="row form-group">
												<label class="col-md-5" for="session">Session :</label>
												
												<select name="Session" class="browser-default custom-select col-md-7">
													<option id="select" selected>Select Session Year</option>
													<option id="2019" value="2019">2019</option>
													<option id="2020" value="2020">2020</option>
													
												</select>

												<?php 
												if ($info['Session'] == "2019") { ?>
													<script>
														document.getElementById("2019").selected = "true";
													</script>
													
												<?php	}elseif ($info['Session'] == "2020") {  ?>

													<script>
														document.getElementById("2020").selected = "true";
													</script>
													
												<?php	}else { ?>

													<script>
														document.getElementById("select").selected = "true";
													</script>	
												<?php	}


												?>
												
											</div>
										</div>
										<div class="col-md-6">
											<div class="row form-group">
												<label class="col-md-5" for="class">Class : 
													<?php 
													if (isset($errclass)) {
														echo "<span style='color: red;font-size: 15px;' >$errclass</span>";
													}

													?>
												</label>
												<select name="Class" class="browser-default custom-select col-md-7">
													<option selected>Select Class</option>
													<option id="Six" value="Six">Six</option>
													<option id="Seven" value="Seven">Seven</option>
													<option id="Nine" value="Nine">Nine</option>
													<option id="Ten" value="Ten">Ten</option>
													
												</select>
												<?php 
												if ($info['Class'] == "Six" ) { ?>
													<script>
														document.getElementById("Six").selected = "true";
													</script>

												<?php }elseif ($info['Class'] == "Seven" ) { ?>

													<script>
														document.getElementById("Seven").selected = "true";
													</script>
													
												<?php	}elseif ($info['Class'] == "Nine") { ?>
													<script>
														document.getElementById("Nine").selected = "true";
													</script>
												<?php	}elseif ($info['Class'] == "Ten") { ?>
													<script>
														document.getElementById("Ten").selected = "true";
													</script>
												<?php	}

												?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="row form-group">
												<label class="col-md-5" for="shift">Shift :</label>
												<select name="shift" class="browser-default custom-select col-md-7">
													<option selected>Select Shift</option>
													<option id="Day" value="Day">Day</option>
													<option id="Morning" value="Morning">Morning</option>
													
												</select>
												<?php 
												if ($info['Shift'] == "Day" ) { ?>
													<script type="text/javascript">
														document.getElementById("Day").selected = true;
													</script>
													
												<?php	}elseif ($info['Shift'] == "Morning" ) { ?>
													<script type="text/javascript">
														document.getElementById("Morning").selected = true;
													</script>
												<?php	}
												?>

											</div>
										</div>
										<div class="col-md-6">
											<div class="row form-group">
												<label class="col-md-5" for="section">Section :</label>
												<select name="Section" class="browser-default custom-select col-md-7">
													<option id="Select" selected>Select Section</option>
													<option id="A" value="A">A</option>
													<option id="B" value="B">B</option>
													<option id="C" value="C">C</option>
												</select>
												<?php 
												if ($info['Section'] == "A") { ?>
													<script type="text/javascript">
														document.getElementById("A").selected = true;
													</script>
													
												<?php	}elseif ($info['Section'] == "B") { ?>
													<script type="text/javascript">
														document.getElementById("B").selected = true;
													</script>
												<?php	}elseif ($info['Section'] == "C") { ?>
													<script type="text/javascript">
														document.getElementById("C").selected = true
													</script>
												<?php	}else{ ?>
													<script type="text/javascript">
														document.getElementById("Select").selected = true;
													</script>

												<?php	}
												?>
											</div>
										</div>
									</div>
									<div class="row justify-content-end">
										<input type="submit" name="Save" value="save" class="btn btn-primary">
										<input type="reset" name="Reset" value="reset" class="btn btn-primary ml-2">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

	<?php 

	if (isset($Roll) && isset($StudentName) && isset($Age) && isset($Gender) && isset($MobileNumber) && isset($Studentadres) && isset($Class)) {

		$session = (isset($Session)) ? $Session : "";
		$shift = (isset($Shift)) ? $Shift : "";
		$section = (isset($Section)) ? $Section : "";


		if ($con) {

			

			$quer = "UPDATE student_info SET Roll = $Roll, Name = '$StudentName', Age = $Age, Gender = '$Gender', Number = $MobileNumber, Address = '$Studentadres', Class = '$Class', Session = '$session', Shift = '$shift', Section = '$section' WHERE SL = $Sl_no";

			if(mysqli_query($con,$quer)) { ?>				

				<script type="text/javascript">

					$(document).ready(function(){

						$('#myalert').show();
						
						setTimeout(function(){ 
							$('#myalert').hide('fade');

						}, 2000);

						setTimeout(function(){
							window.open("Index.php","_self");
						},3000);

					});

					


				</script>
				

				<?php

				
				
				




			} else {
				echo '<script>location.href = "Insert.php?error=2"</script>';
				
			}




		}else{
			echo "Faild";
		}





	}

	



	?>




	
</body>
</html>



