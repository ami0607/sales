<?php

include "../classes/product.php";

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$image_name = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];

$product = new Product;

$product->updateProduct($product_id, $product_name, $price, $quantity, $image_name, $tmp_name);