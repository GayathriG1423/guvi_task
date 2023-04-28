<?php
// Create a database connection
$db = mysqli_connect('localhost', 'root', '', 'test_db');
// Check if the connection was successful
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

    $id = $_GET['id'];

    // Fetch the profile data from the database
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($db, $sql);

    if (!$result) {
        die("Error fetching profile data: " . mysqli_error($db));
    }

    $profile = mysqli_fetch_assoc($result);


// Check if the form was submitted
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email= $_POST['email'];
    $address = $_POST['address'];
    $landmark = $_POST['landmark'];
    $pincode = $_POST['pincode'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];

    // Update the profile data in the database
    $sql = "UPDATE user SET username = '$username',  email= '$email', landmark ='$landmark',pincode='$pincode',address = '$address',dob = '$dob',contact = '$contact',age = $age
                    WHERE id = $id";

    if (mysqli_query($db, $sql)) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . mysqli_error($db);
    }

    // Refresh the page to show the updated data
    header("Refresh:0");
}

// Close the database connection
mysqli_close($db);
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
  </head>

  <h1>User Profile</h1>
<div class="profile-input-field">
        <h3>Please Fill-out All Fields</h3>
        <form method="post" action="#" >
          <div class="form-group">
            <label>Fullname</label>
            <input type="text" class="form-control" name="username" style="width:20em;" placeholder="Username" required /><br><br>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" style="width:20em;" placeholder="Email" required  />
          </div>
          <div class="form-group">
            <label>Landmark</label>
            <input type="text" class="form-control" name="landmark" style="width:20em;" placeholder="Landmark"required / >
          </div>
          <div class="form-group">
            <label>Pincode</label>
            <input type="text" class="form-control" name="pincode" style="width:20em;" placeholder="Pincode" required />
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" style="width:20em;" placeholder="Address" required />
          </div>
          <div class="form-group">
            <label>Dob</label>
            <input type="date" class="form-control" name="dob" style="width:20em;" placeholder="Dob" required />
          </div>
          <div class="form-group">
            <label>Age</label>
            <input type="number" class="form-control" name="age" style="width:20em;" placeholder="Age" required />
          </div>
          <div class="form-group">
            <label>Contact</label>
            <input type="number" class="form-control" name="contact" style="width:20em;" required placeholder="Contact" required />
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
            <center>
             <a href="logout.php">Log out</a>
           </center>
          </div>
        </form>
      </div>
      </html>
