<?php
// session_start();
if(isset($_SESSION['username'])){
    echo 'Current users : '.$_SESSION['username'];
    }
    else {
        echo'<a href="index.php"> Please login</a>';
        header("location:login.php");
    }
    ?>