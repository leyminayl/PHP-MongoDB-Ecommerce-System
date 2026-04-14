<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login to Online Shop</h2>
    <form action="login.php" method="POST">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <?php if(isset($_SESSION['error'])) { echo "<p style='color:red;'>".$_SESSION['error']."</p>"; unset($_SESSION['error']); } ?>
</body>
</html>
