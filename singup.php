<?php

include 'config.php';
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$pass = $_GET['pass'];



$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
$query_json = "SELECT * from user where email='$email'";
            $result = mysqli_query($con,$query_json);
            $row = mysqli_fetch_array($result);
            if(!$row)
            {
    
$query_dis="INSERT INTO user (fname,lname, email,phone, pass, status)
VALUES ('$fname', '$lname', '$email', '$phone','$pass','Active')";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);
 echo '<script> alert("User Registerd Successfully")</script>';
      echo "<script type='text/javascript'> document.location = 'Login/account.html';</script>";
}else{
      echo '<script> alert("User exists please try again")</script>';
      echo "<script type='text/javascript'> document.location = 'singup.html';</script>";
}
?>
