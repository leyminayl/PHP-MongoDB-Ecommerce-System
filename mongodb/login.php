<?php
session_start();
require 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

var_dump($username);
var_dump($password);

$user = $loginCollection->findOne([
    'username' => $username,
    'password' => $password
]);

if ($user) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = ($username === 'admin') ? 'admin' : 'user';

    if ($_SESSION['role'] === 'admin') {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: user/view_products.php");
    }
    exit;
} else {
    $_SESSION['error'] = "Invalid credentials!";
    header("Location: index.php");
}
?>
