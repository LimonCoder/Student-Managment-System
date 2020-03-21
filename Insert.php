<?php 
	session_start();
	if (!isset($_SESSION['value'])) {
		
		header("location: Login/Login.php");
		
	}

		$con = mysqli_connect("localhost","root","","sms");





	
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
				
				if (strlen($_POST['StudentMobileNo']) >= 11) {
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

		if (!empty($_FILES['image']['name'])) {
			
			$file_name = rand(11111111,999999999).$_FILES['image']['name'];

			$path = explode(".",$file_name);

			$extension = ["jpg","JPG","png"];



			if(in_array($path[1],$extension)){

				$folder = "Image/".$file_name;
				$imagtemp = $_FILES['image']['tmp_name'];
				move_uploaded_file($imagtemp, $folder);
				
			}else{
				$invalidimage = "Only jpg & png file allow";
			}



		}else{

			$errimage = "*";

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
</head>
<body>
	
	<div class="jumbotron">
		
		<div class="row justify-content-center">

			<div class="col-sm-8">
				<div class="row justify-content-end">
					<a href="Index.php" class="btn btn-primary mr-3 mb-2 "  >Student List</a>
				</div>
				<?php 
					if (isset($_GET['error'])) { ?>
						<div id="myalert" class="alert alert-danger">
							<strong>Error !!</strong> Data Successfully Faild
						</div>
						<script type="text/javascript">

							$(document).ready(function(){
								$('#myalert').show();

								setTimeout(function(){
									$('#myalert').hide('fade');
								},1000);

							});


						</script>


				<?php	}
					unset($_GET['error']);

				 ?>
				<div class="card">
					<div class="card-header">Student Addmission</div>
					<div class="card-body">
						<form action="" method="POST" enctype="multipart/form-data">

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
										<input type="text" class="form-control col-md-9" id="roll" name="Roll" >
									</div>
									<div class="row form-group">
										<label class="col-md-3" for="name">Name :
											<?php 
												if (isset($errName)) {
													echo "<span style='color: red;font-size: 15px;' >$errName</span>";
												}
											 ?>
										</label>
										<input type="text" class="form-control col-md-9" id="name" name="StudentName" >
									</div>
									<div class="row form-group">
										<label class="col-md-3" for="Age">Age :
											<?php if (isset($errage)) {
												echo "<span style='color: red;font-size: 15px;' >$errage</span>";
											}elseif (isset($Invaildage)) {
												echo "<span style='color: red;font-size: 15px;' >$Invaildage</span>";
											} ?>
										</label>
										<input type="text" class="form-control col-md-9" id="Age" name="StudentAge" >
									</div>
									<div class="row form-group">
										<label class="col-md-3" for="gender">Gender :
											<?php 
												if (isset($errgender)) {
													echo "<span style='color: red;font-size: 15px;' >$errgender</span>";
												}
											 ?>
										</label>
										<div class="radio">
											<input type="radio" id="gender"  name="StudentGender" value="male" >Male
											<input type="radio" class="ml-2"  name="StudentGender"  value="famale" >Famale
										</div>
									</div>
									<div class="row form-group">
										<label class="col-md-3" for="Image">Image :
											<?php 
											if (isset($errimage)) {
												echo "<span style='color: red;font-size: 15px;' >$errimage</span>";
											}elseif (isset($invalidimage)) {
												echo "<span style='color: red;font-size: 15px;' >$invalidimage</span>";
											}
											?>
										</label>
										<div class="row">
											<div class="col-md-7">
												 
												<img id="blah" src="user.png" width="100" height="100">
											</div>

											<div class="col-md-7 mt-1 d-block">
												<input type="file" name="image" id="imgInp" >
											</div>
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
										<input type="text" class="form-control col-md-9" id="mobile" name="StudentMobileNo" >
									</div>
									<div class="row form-group">
										<label class="col-md-3" for="address">Address :
											<?php 
												if (isset($erraddress)) {
													echo "<span style='color: red;font-size: 15px;' >$erraddress</span>";
												}
											 ?>
										</label>
										<input type="text" class="form-control col-md-9" id="address" name="StudentAddress" >
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
														<option selected>Select Session Year</option>
														<option value="2019">2019</option>
														<option value="2020">2020</option>
														
													</select>
												
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
													<option value="Six">Six</option>
													<option value="Seven">Seven</option>
													<option value="Nine">Nine</option>
													<option value="Ten">Ten</option>
					
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="row form-group">
												<label class="col-md-5" for="shift">Shift :</label>
												<select name="shift" class="browser-default custom-select col-md-7">
													<option selected>Select Shift</option>
													<option value="Day">Day</option>
													<option value="Morning">Morning</option>
													
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="row form-group">
												<label class="col-md-5" for="section">Section :</label>
												<select name="Section" class="browser-default custom-select col-md-7">
													<option selected>Select Section</option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="C">C</option>
												</select>
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

	if (isset($Roll) && isset($StudentName) && isset($Age) && isset($Gender) && isset($MobileNumber) && isset($Studentadres) && isset($Class) && isset($folder)) {

		$session = (isset($Session)) ? $Session : "";
		$shift = (isset($Shift)) ? $Shift : "";
		$section = (isset($Section)) ? $Section : "";


		if ($con) {

			$query = "INSERT INTO student_info VALUES (Null,$Roll,'$StudentName',$Age,'$Gender', '$folder', $MobileNumber,'$Studentadres','$Class','$session','$shift','$section')";

			if (mysqli_query($con,$query)) { 
				 
				 $_SESSION["success"] = "succ";
				 ?>
				 <script type="text/javascript">
				 	$(document).ready(function(){

				 		setTimeout(function(){
				 			window.open("Index.php","_self");
				 		},1000);
				 	});
				 </script>
				

		<?php	} else {
				echo '<script>location.href = "Insert.php?error=2"</script>';
				
			}




		}else{
			echo "Faild";
		}





	}

	



	?>

	<script type="text/javascript">
		
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#blah').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#imgInp").change(function() {
			readURL(this);
		});

	</script>





	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>



