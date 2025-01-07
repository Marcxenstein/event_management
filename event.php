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

    </div>
    <br>
    <div class="event_creator">
 
        <?php echo'<form method="POST" action="'.neweve($db).'">';?>
            <label>Event Name</label>
            <input type="text" name="eventitle">
            <br>
            <label>Number of seats</label>
            <input type="text" name="nos">
            <br>
            <label>Date</label>
            <input type="date" name="edate">
            <br>
            <label>Time</label>
            <input type="time" name="etime">
            <br>
            <label>Duration</label>
            <input type="text" name="durations">
            <br>
            <button type="submit">Save</button>
            <button type="reset"> Reset</button>
            <br>
            <a href="main.php">Home</a>

        </form>
    </div>
</body>
</html>
