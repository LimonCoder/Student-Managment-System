<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "Userregistration";

$sql = mysqli_connect($hostname,$username,$password);


// Database Connection 

if(!$sql){
	die("Database connection faild..");

}

// database creating.
$query = "CREATE DATABASE $db_name";



if(mysqli_query($sql,$query)){

	//select Database
    mysqli_select_db($sql, $db_name);

    $table_name = "CREATE TABLE user_info (
    SL INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  
    Name VARCHAR(30) NOT NULL,
    Email VARCHAR(30) NOT NULL,
    Gender VARCHAR(7) NOT NULL,
    password VARCHAR(30) NOT NULL
    )";

    // Create Table Check 
    if (!mysqli_query($sql,  $table_name)) {

        echo "Error creating table: " . mysqli_error($con);

    } 

}

mysqli_close($sql);

?>