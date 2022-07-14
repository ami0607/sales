<?php
require "database.php";

class Product extends Database{

    private $buy_quantity;
    private $price;
    private $maximum;
    
    //Get ALL Products
    public function getAllProducts($id){
        $sql = "SELECT `id`, `product_name`, `price`, `quantity`, `photo` FROM `products`";

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Error retrieving all products: " . $this->conn->error);
        }
    }

    //Add Product
    public function addProduct($product_name, $price, $quantity, $image_name, $tmp_name){
        $sql = "INSERT INTO `products` (`product_name`, `price`, `quantity`, `photo`) VALUES ('$product_name', '$price', '$quantity', '$image_name')";

        if($this->conn->query($sql)){
            $destination = "../assets/images/$image_name";
            if(move_uploaded_file($tmp_name, $destination)){
                header("location: ../views/product.php");
                exit;
            }else{
                die("Error in moving the photo: ");
            }  
        }else{
            die("Error adding product: " . $this->conn->error);
        }
    }


    //Get Product
    public function getProduct($id){
        $sql = "SELECT `id`, `product_name`, `price`, `quantity`, `photo` FROM `products` WHERE `id` = $id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die("Error retrieving product: " . $this->conn->error);
        }
    }

    //Update Product
    public function updateProduct($product_id, $product_name, $price, $quantity, $image_name, $tmp_name){
        if(!empty($image_name)){
            $sql = "UPDATE products SET `product_name` = '$product_name', `price` = '$price', `quantity` = '$quantity', `photo` = '$image_name' WHERE id = '$product_id'";
            if($this->conn->query($sql)){
                $destination = "../assets/images/$image_name";
                if(move_uploaded_file($tmp_name, $destination)){
                    header("location: ../views/product.php");
                    exit;
                }else{
                    die("Error in moving the photo: ");
                }
            }else{
                die("Error updating: " . $this->conn->error);
            }
        }else{
            $sql = "UPDATE products SET `product_name` = '$product_name', `price` = '$price', `quantity` = '$quantity' WHERE id = '$product_id'";
            if($this->conn->query($sql)){
                header("location: ../views/product.php");
                exit;
            }else{
                die("Error updating: " . $this->conn->error);
            }
        }
        
    }

    //Delete Product
    public function deleteProduct($id){
        $sql = "DELETE FROM `products` WHERE `id` = $id";

        if($this->conn->query($sql)){
            header("location: ../views/product.php");
            exit;
        }else{
            die("Error deleting: " . $this->conn->error);
        }
    }

    //SET VALUES
    public function set_values($buy_quantity, $price, $maximum){
        $this->buy_quantity = $buy_quantity;
        $this->price = $price;
        $this->maximum = $maximum;
    }

    //Get Buy Quantity
    public function get_buy_quantity(){
        return $this->buy_quantity;
    }

    //Get Price
    public function get_price(){
        return $this->price;
    }

    //Get Maximum
    public function get_maximum(){
        return $this->maximum;
    }

    //Total Price
    public function totalPrice(){
        $total = $this->price * $this->buy_quantity;
        return $total;
    }

    //Update Quantity
    public function updateQuantity($buy_quantity, $product_id){
        $sql="UPDATE products SET `quantity` = `quantity` - '$buy_quantity' WHERE id = '$product_id'";

        if($this->conn->query($sql)){
            header("location: ../views/product.php");
            exit;
        }else{
            die("Error with payment: " . $this->conn->error);
        }
    }



        




    // echo "<div class='alert alert-success text-center' role='alert'>NEW PRODUCT ADDED</div>";
}

?>