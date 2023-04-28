
<?php
session_start();

// $_SESSION["email"]="email";
// $_SESSION["id"]= "id";
// $email=  $_SESSION["email"];
// $id=$_SESSION[""];
$id=$_POST['id'];

// Create a database connection
$db = mysqli_connect('localhost', 'root', '', 'test_db');
$error ="";
// Check if the connection was successful
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}


    // Fetch the profile data from the database
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($db, $sql);

    if (!$result) {
        die("Error fetching profile data: " . mysqli_error($db));
    }

    $profile = mysqli_fetch_assoc($result);


// Check if the form was submitted

    $username = $_POST['name'];
    $email= $_POST['email'];
    $address = $_POST['address'];
    $landmark = $_POST['landmark'];
    $pincode = $_POST['pincode'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    echo "name: " . $username;

//     // Update the profile data in the database
//     $stmt= $db->prepare("UPDATE users SET username = ?, email = ?,landmark =?,pincode=?,address = ?,dob = ?,age = ?,contact = ? WHERE id = ?" );
//     $stmt->bind_param("ssssssssi", $username, $email,$landmark,$pincode,$address,$dob,$age,$contact,$id);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     if ($result === false) {
//     // Query failed, print the error message
//     echo "Error updating user: " . $error[2];
// } else {
//     // Query succeeded
//     echo "User updated successfully";
// }
     $sq = "UPDATE user SET username = '$username',  email= '$email', landmark ='$landmark',pincode='$pincode',address = '$address',dob = '$dob',contact = '$contact',age = '$age'
                   WHERE id = $id";
if (mysqli_query($db, $sq)) {
    // Query executed successfully
    //echo "Record updated successfully";
    header("location: profile.html");
  //  header("location: profile.php?email=".urlencode($email));
} else {
    // Query failed
    echo "Error updating record: " . mysqli_error($db);
}




// Close the database connection
mysqli_close($db);
?>
