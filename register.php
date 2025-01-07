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
<body>
    <div>
<?php echo'<form method="POST" action="'.register($db).'">'; ?>
    <label>Fullname</label>
    |<input type="text" name="fullname" id="fullname">
    <br>
    <label>Username</label>
    <input type="text" name="username">
    <br>
    <label>Email address</label>
    <input type="text" name="email">
    <br>
    <label>Password</label>
    <input type="password" name="password">
    <br>
    <label>Confirm Password</label>
    <input type="password" name="password0" id="">
    <br>
    <button type="submit" name="submit">Register</button>
<br>
<a href="login.php">I have an account</a>
</form>
    </div>
</body>
</html>