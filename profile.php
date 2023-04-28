<?php
// Start a session

session_start();
$email=  $_SESSION["email"];
//$email = $_GET['email'];



// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test_db');
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}


// Prepare the statement
$stmt = mysqli_prepare($db, "SELECT id, username, email,landmark,pincode,address,dob,age,contact FROM user where email=?");

mysqli_stmt_bind_param($stmt, "s", $email);
// Execute the statement
mysqli_stmt_execute($stmt);

// Bind the result variables
mysqli_stmt_bind_result($stmt, $id, $name, $email,$landmark,$pincode,$address,$dob,$age,$contact);

$rows = array();
while ($row=mysqli_stmt_fetch($stmt)) {

  echo "<tr><td>ID " .  "</td><td>Name" . "</td><td>Email" .  "</td><td>Landmark" . "</td><td>Pincode" ."</td><td>Address" . "</td><td>DOB" . "</td><td>Age" . "</td><td>Contact" ."</td></tr>" ;
    echo "<tr><td>" . $id . "</td><td>" . $name . "</td><td>" . $email .  "</td><td>" . $landmark ."</td><td>" . $pincode ."</td><td>" . $address ."</td><td>" . $dob."</td><td>" . $age ."</td><td>" . $contact. "</td></tr>" ;



     $rows[] = $row;

}

mysqli_stmt_close($stmt);
mysqli_close($db);

?>
