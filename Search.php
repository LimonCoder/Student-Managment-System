<?php 



if (isset($_POST['Submit'])) {

	if (!empty($_POST['search'])) {

		$Search = $_POST['search'];
	}else
	{
		$errSearch = "*";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Search..</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container" onload = "JavaScript:AutoRefresh(1000);">
		<div class="row">
			<div class="col-8" >
				<div class="card">
					<div class="card-header p-3">
						<h3 class="bg-success display-3 "  >Results :</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead class="thead-dark">
								<tr>
									<th>SL No.</th>
									<th>Roll No</th>
									<th>Name</th>
									<th>Gender</th>
									<th>Age</th>
									<th>Mobile Number</th>
									<th>Address</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 

								if (isset($Search)) {
									


									$con = mysqli_connect("localhost","root","","sms");

									if ($con) {

										$query = "SELECT * FROM student_info WHERE Roll LIKE '%$Search%' OR Name LIKE '%$Search%' OR Age LIKE '%$Search%' OR Gender LIKE '%$Search%' OR Number LIKE '%$Search%' OR Address LIKE '%$Search%' OR Class LIKE '%$Search%' OR Session LIKE '%$Search%' OR Shift LIKE '%$Search%' OR Section LIKE '%$Search%' ";

										$results =  mysqli_query($con,$query);

										if (mysqli_num_rows($results)) {

											while ($row = mysqli_fetch_assoc($results)) {  ?>

											<tr>
												<td><?php echo $row['SL']; ?></td>
												<td><?php echo $row['Roll']; ?></td>
												<td><?php echo $row['Name']; ?></td>
												<td><?php echo $row['Gender']; ?></td>
												<td><?php echo $row['Age']; ?></td>
												<td><?php echo $row['Number']; ?></td>
												<td><?php echo $row['Address']; ?></td>
												<td><a href="View.php?id=<?php echo $row['SL'];?>" class="btn 		btn-success

													">View</a>
													<a href="Update.php?id=<?php echo $row['SL']  ?>" class="btn btn-warning text-dark

														">Edit</a>

														<a onclick="onprint('View.php?id=<?php echo $row['SL']  ?>')" class="btn btn-success">Print</a>
														<div id="userInfo" style="display: none;"></div>

													</td>
												</tr> 
										<?php	}
											
										}else{  ?>

											<tr>
												<td colspan="8">
													<div class="alert alert-danger" role="alert">
														No Data Reamining For This Local Server !!
													</div>
												</td>
											</tr>


									<?php	}


										
									}

								}else{   ?>

								<div class="alert alert-danger">
									<strong>Data Not Found !!!</strong> 
								</div>

						<?php	}		
							?>

								           
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
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

</body>
</html>


 





