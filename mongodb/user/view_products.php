<?php
//View product for user
session_start();
require '../config.php';

if ($_SESSION['role'] !== 'user') {
    header("Location: ../index.php");
    exit;
}

$products = $productCollection->find();
?>

<h2>Product List</h2>
<a href="../logout.php">Logout</a>
<ul>
<?php foreach ($products as $product): ?>
    <li>
        <h3><?= $product['ProductName'] ?></h3>
        <img src="../<?= $product['ProductImage'] ?>" width="100"><br>
        <strong>Price:</strong> ₱<?= $product['SellingPrice'] ?><br>
        <strong>In Stock:</strong> <?= $product['InStock'] ?><br>
        <strong>Rating:</strong> <?= $product['Rating'] ?>/10<br>
        <p><?= $product['Description'] ?></p>
    </li>
<?php endforeach; ?>
</ul>
