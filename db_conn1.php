<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Database connection code
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert data into table code
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password_1'];
    $landmark = $_POST['landmark'];
    $pincode = $_POST['pincode'];
    $address= $_POST['address'];

    if ($_POST['password_1'] != $_POST['password_2']) {
        echo "Passwords do not match.";
    } else {
         // Encrypt the password before saving in the database

        $sql = "INSERT INTO user (username, email, password, landmark, pincode,address) VALUES ('$username', '$email', '$password', '$landmark', '$pincode','$address')";

        if (mysqli_query($conn, $sql)) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);

?>
