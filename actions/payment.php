<?php

include "../classes/product.php";

//data
$buy_quantity = $_POST['buy_quantity'];
$product_id = $_GET['product_id'];

//object
$product = new Product;



//call method
$product->updateQuantity($buy_quantity, $product_id);

