<?php
include "../classes/product.php";

$product = new Product;
$product_details = $product->getProduct($_GET['product_id']);

$quantity = $product_details['quantity'];

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buy Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>

  <div class="container-fluid" style="padding-top: 80px">
    <div class="row display-4">
        <div class="col-sm-1"><a href="../views/product.php"><i class="fa-solid fa-house text-dark"></i></a></div>
        <div class="col-sm-10"></div>
        <div class="col-sm-1"><a href="../actions/logout.php"><i class="fa-solid fa-user-xmark text-danger"></i></a></div>
    </div>

    <div class="container">
    <div class="card my-auto mx-auto border-0" style="width: 40%;">
        <div class="card-header border-0 bg-transparent">
            <h1 class="text-success fw-bold display-3 text-center"><i class="fa-solid fa-cash-register text-success"></i> Buy Product</h1>
        </div>
        <div class="card-body">
            <form action="../views/payment.php?product_id=<?php echo $product_details['id'] ?>" method="post">

            <!-- photo -->
            <div class="card-body text-center">
                <img src="../assets/images/<?= $product_details['photo'] ?>" alt="<?= $product_details['photo'] ?>" style="height: 10rem" class="border">
            </div>

                
                <div class="row">
                    <div class="col-6"></div>
                    <label for="product_name" class="form-label text-secondary mb-3">Product name</label>
                    <div name="product_name" class="mb-3 fw-bold fs-3"><?= $product_details['product_name']?></div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="price" class="form-label text-secondary mb-3">Price</label>
                        <div name="price" class="mb-3 fw-bold fs-3"><?= $product_details['price']?></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="stock" class="form-label text-secondary mb-3">Stocks Left</label>
                        <div name="stock" class="mb-3 fw-bold fs-3"><?= $product_details['quantity']?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="quantity" class="form-label text-secondary my-3">Buy Quantity</label>
                    </div>
                    <div class="col-sm-6"></div>  
                </div>
                <input type="number" name="quantity" max="<?php echo $quantity; ?>" class="form-control mx-auto w-75" required>
               
                <button type="submit" name="btn_pay" class="btn btn-success w-100 mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Pay</button>

            </form>
        </div>
    </div>
    </div>
</div>

    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>