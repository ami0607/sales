<?php
//include
include "../classes/product.php";

//new object
$product = new Product;

//call method
$product->deleteProduct($_GET['product_id']);