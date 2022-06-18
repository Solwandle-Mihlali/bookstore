<?php

use PhpMyAdmin\Sql;

session_start();
$con = mysqli_connect('localhost','root','');

$dbname="bookstore";
 
# Check connection

	if (!$con) {
		
			die("Connection failed: " . mysqli_connect_error());
		 	
		}
		
		//echo "<br>Connected successfully<br>";


	$selectDB = mysqli_select_db($con,$dbname);
	

		if (!$selectDB) {

		$sql = "CREATE DATABASE ".$dbname."";
		
		mysqli_query($con, $sql); 
		
		
		//echo "<br>Database ".$dbname." succesfully created<br>";

		} else {
			
		  // echo "<br>Database ".$dbname." already exsist<br>";
			
		}
	
	# new connection with database name specified
	
    $conn = mysqli_connect('localhost','root','',$dbname);

   
    if(isset($_POST['signInBtn'])){
         
       # $student = $_POST['signInStd'];
       #$student_pass = $_POST['signinPass'];

       # $sql1 = $con -> prepare ("SELECT student_num FROM  tbl_user WHERE student_num = $student limit 1");
       # $sql2 = $con -> prepare ("SELECT password FROM  tbl_user WHERE password = $student_pass limit 1");

      #  if($student != $sql1 || $student_pass != $sql2){

           # echo "student does not exist ";
        
      #  }
       # else{

           
       # }
        
       header('Location: studentHome.php');

        
    }



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="studentLogin.css">
    <title>StudentLogin</title>
</head>
<body>

<div class="container">
       <section class="loginForm" id="loginForm">
        <form action="" method="POST">
            <input type="text" placeholder="Student Num..." name="signInStd">
            <input type="password" placeholder="Password" name="signinPass">
            <button type="submit" name="signInBtn">LOG IN</button>
            <a href="studentRegister.php">REGISTER</a>
          </form>
       </section>
    </div>
    
</body>
</html>