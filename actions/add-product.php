<?php
//include
include "../classes/product.php";


//collect data
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];


$image_name = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];

//new object
$product = new Product;

//call method
$product->addProduct($product_name, $price, $quantity, $image_name, $tmp_name);
// $product->addPhoto($image_name, $tmp_name);

?>