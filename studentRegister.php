<?php

use PhpMyAdmin\Scripts;
error_reporting(0);
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
    


    #creating tables

    $sqla = "CREATE TABLE `tblUser` (
        `user_id` int(10) NOT NULL AUTO_INCREMENT,
        `name` varchar(50) NOT NULL,
        `surname` varchar(50) NOT NULL,
        `student_num` int(255) NOT NULL,
        `password` varchar(200) NOT NULL,
        PRIMARY KEY (`user_id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    

    #storing details 

    $name;
    $surname;
    $studentNum;
    $password;
    $email;
    $sql;
    ;
    
    #logic for register form 
    if(isset($_POST['submitBtn'])){

        $name = $_POST['fName'];
        $surname = $_POST['lName'];
        $studentNum = $_POST['studentNum'];
        $email = $_POST['email'];
        $password = md5($_POST['pass']);
        $confirm = $_POST['confPass']; 
         
        $sql = "INSERT INTO tbl_user(name,surname,student_num,email,password)
        VALUES('$name','$surname','$studentNum','$email','$password')";

        if(mysqli_query($con,$sql)){
           
            echo "registred";
            header('Location: studentLogin.php');
        }
        else{
            echo 'query error:' . mysqli_error($con);
        }
    }
?>


<!--   HTML   -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="studentRegister.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Register</title>
</head>
<body>
   
    <div class="container">
       <section class="registerForm" id="registerForm">
        <form action=" " method="POST">
            <input type="text" placeholder="student number..." name="studentNum" required>
            <input type="text" placeholder="Name..." name="fName" required>
            <input type="text" placeholder="Surname.." name="lName" required>
            <input type="text" placeholder="Email.." name="email" required>
            <input type="password" placeholder="Password" name="pass" required>
            <input type="password" placeholder="Confirm" name="confPass" required>
            <button type="submit" name="submitBtn"><a>REGISTER</a></button>
          </form>
      </section>
    </div>
 
</body>
</html>