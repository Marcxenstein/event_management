<?php
require 'backend.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>


<?php echo '<form method="POST" action="'.logins($db).'">' ; ?>
    <label for="">Username</label>
    <input type="text" name="username" id="">
    <br>
    <label for="">Password</label>
    <input type="password" name="password" id="">
    <br>
<button type="Submit"> login </button>
<br>
<a href="register.php">Register</a>
</form>
</body>
</html>