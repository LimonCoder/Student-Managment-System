<?php 

$servername = "localhost";
$username = "root";
$password = "";
$mysql_database = "Sms";

// Database connection 
$con = mysqli_connect($servername,$username,$password);

// Database Connection Check
if (!$con) {
	die("Database connection Faild".mysqli_connect_error());
}


// Create Database 
$query = "CREATE DATABASE $mysql_database";



// Database Create Check 
if (mysqli_query($con,$query)) {

	// Database Selected
	mysqli_select_db($con, $mysql_database);
	
	//Create Table
	$sql = "CREATE TABLE student_info (
    SL INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Roll INT(4) NOT NULL,
    Name VARCHAR(30) NOT NULL,
    Age INT(30) NOT NULL,
    Gender VARCHAR(7) NOT NULL,
    Image VARCHAR(30) NOT NULL,
    Number INT(12) NOT NULL,
    Address VARCHAR(30) NOT NULL,
    Class VARCHAR(6) NOT NULL,
    Session VARCHAR(30) NOT NULL,
    Shift VARCHAR(30) NOT NULL,
    Section VARCHAR(50) NOT NULL    
    )";

    // Create Table Check 
	if (!mysqli_query($con, $sql)) {

		echo "Error creating table: " . mysqli_error($con);

	} 

	

}


mysqli_close($con);



?>