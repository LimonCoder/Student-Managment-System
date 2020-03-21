<?php
	
	session_start(); 

	if (!isset($_SESSION['value'])) {
		
		header("location: Login/Login.php");
		
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</head>
<body >
	
	<div class="row">
		<div class="col-md-5">
			<a href="Insert.php" class="btn btn-primary m-2 ">Add New Student</a>
		</div>
		<div class="col-md-7 ">

			<div class="row justify-content-end">
				<button class="btn btn-success px-2 py-2 mr-4 mt-1" style="cursor:context-menu;">
					<?php 	
					$con = mysqli_connect("localhost","root","","sms");

					if ($con) {

						$query = "SELECT COUNT(*) FROM student_info";

						$student_count =  mysqli_query($con,$query);

						$red = mysqli_fetch_assoc($student_count); ?>
						Total Students : <span class="badge badge-light"><?php echo $red['COUNT(*)']; ?></span>

						

						
							 
						

				<?php	mysqli_close($con);
					}

					?>

				</button>
			</div>




		</div>

	</div>

	<div class="row   justify-content-end">
		<form action="Search.php" class="form-inline m-3" method="POST" >
			<div class="form-group">
				<input id="myInput" type="text" class="form-control"  name="search" placeholder="search">
				
			</div>
		</form>
	</div>
	<?php 
	
	
	if (isset($_SESSION["success"])) { ?>
		<div id="myalert" class="alert alert-success">

			<strong>Success!</strong> Information Added Successfully
		</div>
		<script type="text/javascript">

			$(document).ready(function(){
				$('#myalert').show();

				setTimeout(function(){
					$('#myalert').hide('fade');
				},1000);

			});


		</script>
		<?php	
	}

	unset($_SESSION["success"]);

	?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header ">
					<h2 class="display-5">Student Information</h2>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover" cellspacing="5px" >

						<thead class="thead-dark">
							<tr>
								<th>SL No.</th>
								<th>Photo</th>
								<th>Roll No</th>
								<th>Name</th>
								<th>Gender</th>
								
								<th>Age</th>
								<th>Mobile Number</th>
								<th>Address</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="myTable">
							<?php 

							$con = mysqli_connect("localhost","root","","sms");

							if ($con) {

								$query = "SELECT * FROM student_info";

								$results =  mysqli_query($con,$query);



								while ($row = mysqli_fetch_assoc($results)) { 
									
										
									?>

									<tr>
										<td><?php echo $row['SL']; ?></td> 
										<?php 
										if (!empty($row['Image'])){ ?>
											<td><img src="<?php echo $row['Image']; ?>" class="rounded-circle" alt="Cinque Terre" width="60" height="60"></td>
										<?php	}else {  ?>
												
												<td></td>

									<?php	}

										?>	
										<td><?php echo $row['Roll']; ?></td>
										<td><?php echo $row['Name']; ?></td>
										<td><?php echo $row['Gender']; ?></td>
										<td><?php echo $row['Age']; ?></td>
										<td><?php echo $row['Number']; ?></td>
										<td><?php echo $row['Address']; ?></td>
										<td><a href="View.php?id=<?php echo $row['SL'];?>" class="btn btn-success

											">View</a>
											<a href="Update.php?id=<?php echo $row['SL']  ?>" class="btn btn-warning text-dark

												">Edit</a>
												<a href="delete.php?id=<?php echo $row['SL'] ?>" class="btn btn-warning text-dark

												">Delete</a>

												<a onclick="onprint('View.php?id=<?php echo $row['SL']  ?>')" class="btn btn-success">Print</a>
												<div id="userInfo" style="display: none;"></div>

											</td>
										</tr>


									<?php	}







								}

								?>





							</tbody>

						</table>
						<div class="row justify-content-end mr-2">
							<nav aria-label="Page navigation example">
								<ul class="pagination justify-content-center">
									<li class="page-item disabled">
										<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
									</li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>

				</div>

			</div>
		</div>
		<div class="row justify-content-end">
			<a class="btn btn-warning mr-4 m-2" href="Login/logout.php">Logout</a>
		</div>

		<script>
			function onprint(para)
			{
				$(document).ready(function(){

					$('#userInfo').load(para,function(){
						var printContent = document.getElementById('userInfo');
						var WinPrint = window.open('', '', 'width=1000,height=1000');
						WinPrint.document.write(printContent.innerHTML);
						WinPrint.document.close();
						WinPrint.focus();
						WinPrint.print();
						WinPrint.close();
					});


				});
			}

			function AutoRefresh( t ) {
               setTimeout("location.reload(true);", t);
            }
		</script>
		<script>
			$(document).ready(function(){
				$("#myInput").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#myTable tr").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
			});
		</script>				






		<?php mysqli_close($con); ?>


	</body>
	</html>