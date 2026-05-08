<?php
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = [
        'ProductName' => $_POST['name'],
        'Description' => $_POST['desc'],
        'InStock' => (int) $_POST['stock'],
        'SellingPrice' => (float) $_POST['price'],
        'Rating' => (int) $_POST['rating'],
        'ProductImage' => 'uploads/' . $_FILES['image']['name']
    ];

    move_uploaded_file($_FILES['image']['tmp_name'], '../' . $product['ProductImage']);
    $productCollection->insertOne($product);

    header("Location: dashboard.php");
}
?>

<form method="POST" enctype="multipart/form-data">
    Name: <input type="text" name="name"><br>
    Desc: <input type="text" name="desc"><br>
    Stock: <input type="number" name="stock"><br>
    Price: <input type="number" step="0.01" name="price"><br>
    Rating: <input type="number" min="1" max="5" name="rating"><br>
    Image: <input type="file" name="image"><br>
    <input type="submit" value="Add Product">
</form>
