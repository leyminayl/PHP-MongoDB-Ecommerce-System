<?php
//delete product
session_start();
require '../config.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];
$productCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

header("Location: dashboard.php");
exit;
