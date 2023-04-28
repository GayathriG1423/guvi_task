<?php

// php code to Update data from mysql database Table
require 'profile.php';
if(isset($_POST['update']))
{
    $db = mysqli_connect('localhost', 'root', '', 'test_db');


   // get values form input text and number

   $id = $_POST['id'];
   $username = $_POST['username'];
   $email= $_POST['email'];


   // mysql query to Update data
   $query = "   UPDATE `users` SET  'username'=$username,'email'=$email WHERE `email` = $email";

   $result = mysqli_query($db, $query);

   if($result)
   {
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($db);
}

?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP UPDATE DATA </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>

        <form action="update.php" method="post">


            New un:<input type="text" name="username" required><br><br>

            New email:<input type="text" name="email" required><br><br>

            <input type="submit" name="update" value="Update Data">

        </form>

    </body>


</html>
