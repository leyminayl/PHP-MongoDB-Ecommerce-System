<?php
//edit product
session_start();
require '../config.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];
$product = $productCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updateData = [
        'ProductName' => $_POST['name'],
        'Description' => $_POST['desc'],
        'InStock' => (int) $_POST['stock'],
        'SellingPrice' => (float) $_POST['price'],
        'Rating' => (int) $_POST['rating']
    ];

    $productCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => $updateData]
    );

    header("Location: dashboard.php");
    exit;
}
?>

<h2>Edit Product</h2>
<form method="POST">
    Name: <input type="text" name="name" value="<?= $product['ProductName'] ?>"><br>
    Desc: <input type="text" name="desc" value="<?= $product['Description'] ?>"><br>
    Stock: <input type="number" name="stock" value="<?= $product['InStock'] ?>"><br>
    Price: <input type="number" step="0.01" name="price" value="<?= $product['SellingPrice'] ?>"><br>
    Rating: <input type="number" name="rating" min="1" max="10" value="<?= $product['Rating'] ?>"><br>
    <input type="submit" value="Update Product">
</form>
