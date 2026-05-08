<?php
//mongodb connection
require 'vendor/autoload.php'; // Composer

$client = new MongoDB\Client("mongodb+srv://202301362:LqTDZG7ariVgPW2c@advabas.mfjwhbx.mongodb.net/"); //local host of my mongodb


$db = $client->guestbook; // database name

//collections
$loginCollection = $db->login;
$productCollection = $db->product;
?>
