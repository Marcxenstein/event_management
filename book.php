<?php 
require 'backend.php';
include 'check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
</head>
<body>
    <div class="event">
        <?php echo'<form method="POST" action="'.pickevent($db).'">';?>
            <label> Pick Event </label>
            <select name="pick">
            <?php
            $qry = "SELECT * FROM events";
            $result = mysqli_query($db,$qry);
            if (mysqli_num_rows($result)>0){
                while ($event = mysqli_fetch_assoc($result))
                echo"<option value='".$event["eventitle"] ."'>".$event["eventitle"]. "</option>";
            }
            else{
                echo" <option value=''> No event </option>";
            }
            ?>
           </select>
           
            <button type="submit" name="book" id="book">Check</button>
          
        </form>

    </div>
    <br>
    <div class="two">
      

        <?php echo'<form method="POST" action="'.test($db).'">';?>

        <button type="submit" name="change" id="change">Book</button>


        </form>
        <br>
        <?php
        if($_SESSION['username']==="Admin"){
            echo'<a href="admin.php">Admin Menu</a>';
        }
        else
        echo'<a href="main.php"> Menu</a>';
        ?>
    </div>
 
</body>
</html>