<?php
session_start();
require '../config.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

$products = $productCollection->find();
?>

<h2>Admin Dashboard</h2>
<a href="add_product.php">Add Product</a> | <a href="../logout.php">Logout</a>
<table border="1">
    <tr>
        <th>Name</th><th>Description</th><th>Stock</th><th>Price</th><th>Rating</th><th>Image</th><th>Actions</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['ProductName'] ?></td>
            <td><?= $product['Description'] ?></td>
            <td><?= $product['InStock'] ?></td>
            <td><?= $product['SellingPrice'] ?></td>
            <td><?= $product['Rating'] ?></td>
            <td><img src="../<?= $product['ProductImage'] ?>" width="50"></td>
            <td>
                <a href="edit_product.php?id=<?= $product['_id'] ?>">Edit</a> | 
                <a href="delete_product.php?id=<?= $product['_id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
