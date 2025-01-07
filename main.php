<?php
require 'backend.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

   <?php 
   if(isset($_SESSION['username'])){
    echo"Welcome, ".$_SESSION['username'];

echo'<br>';
 echo'<form method="POST" action="'.logout($db).'">'; 
   echo '<button type="submit"> Log out </button>';
  echo'  <h1 class="">WELCOME</h1>';
    echo'<div class="div">';
       
       



echo'</form>';
echo'<a href="book.php">book</a> <a href="user_record.php">record</a> ';
echo' </div>';

   }
   else{echo'<a href="index.php"> Please login</a>';}
   
   ?>

  
</body>
</html> <!-- <a href="login.php">login</a> -->
        <!-- <a href="register.php">register</a> -->
        <!-- <a href="main.php">main</a> -->
       
        <!-- <a href="event.php">event</a> -->
       
        <!-- <a href="records.php">All Records</a> -->
   