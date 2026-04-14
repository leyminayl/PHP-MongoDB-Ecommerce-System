<?php
require 'vendor/autoload.php'; 

// Dito natin idadagdag ang options array para sa TLS
$client = new MongoDB\Client(
    "mongodb+srv://202301362:LqTDZG7ariVgPW2c@advabas.mfjwhbx.mongodb.net/",
    [], 
    ["tlsInsecure" => true] // Ito ang solusyon sa TLS handshake error
);

$db = $client->guestbook; 
$loginCollection = $db->login;
$productCollection = $db->product;
?>