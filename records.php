<?php 
require 'backend.php';
include 'check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>All Event Records</h2>
  <?php
  $username=$_SESSION['username'];
  echo '<br>';
$Q = "SELECT * FROM bookings";
$QQ = mysqli_query($db, $Q);
if (mysqli_num_rows($QQ)>0){
 while ($R = mysqli_fetch_array($QQ)){
    echo"<p>"."Username: ".$R["username"]." EventName: ".$R["eventname"]. " EventDate: ".$R["edate"]." Time: ".$R["etime"]."</p>";
    echo'<form method="POST" action="'.del($db).'">';
    echo"<input type='hidden' name='id' value='".$R["uid"]."'/>";
    echo"<input type='submit' name='delete' value='delete'></button>";

    
    echo"</form>";
 }
 }
 else
 {
  echo'No record';}
  ?>
</body>
</html>