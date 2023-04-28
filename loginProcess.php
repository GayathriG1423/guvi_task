<?php

//   $db = mysqli_connect('localhost', 'root', '', 'test_db');
//
//
//  $email=$_POST['email'];
//  $password=$_POST['password'];
//  $sql = "SELECT * FROM users WHERE email='$email'AND password = '$password'";
//  $result = $db->query($sql);
//
//  // Check if query returned a row
//  if ($result->num_rows > 0) {
//  	// User was found, set session variables and return success message
//  	session_start();
//  	$_SESSION['email'] = $email;
//  	$_SESSION['loggedin'] = true;
//  	echo "Login successful.";
//   header("location: profile.php?email=".urlencode($email));
//  } else {
//  	// User not found, return error message
//  	echo "Invalid email or password.";
// }
//  $db->close();
//



//login.php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'test_db');


$email=$_POST['email'];
$password=$_POST['password'];
if(isset($_POST["email"]) && isset($_POST["password"]))
{
 $email = mysqli_real_escape_string($db, $_POST["email"]);
 $password = (mysqli_real_escape_string($db, $_POST["password"]));
 $sql = "SELECT * FROM user WHERE email = '".$email."' AND password = '".$password."'";
 $result = mysqli_query($db, $sql);
 $num_row = mysqli_num_rows($result);
 if($num_row > 0)
 {
  $data = mysqli_fetch_array($result);
  $_SESSION["email"] = $data["email"];
  echo $data["email"];
 }
}
?>
