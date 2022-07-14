<?php
session_start();

include "../classes/product.php";
$product = new Product;
$product_details = $product->getProduct($_GET['product_id']); //url name

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
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
    <div class="card my-auto mx-auto border-0" style="width: 45%;">
        <div class="card-header border-0 bg-transparent">
            <h1 class="text-warning fw-bold display-3 text-center"><i class="fas fa-pencil-alt text-warning"></i> Edit Product</h1>
        </div>
        <div class="card-body">
            <form action="../actions/edit-product.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="<?=$product_details['id'] ?>">

                <!-- photo -->
                <div class="card-body text-center">
                <?php 
                  if(!empty($product_details['photo'])){
                  ?>
                    <img src="../assets/images/<?= $product_details['photo'] ?>" alt="<?= $product_details['photo'] ?>" style="height: 10rem" class="border">
                  <?php
                    }else{
                  ?>
                    <i class="fa-solid fa-image text-center display-4"></i>                 
                  <?php
                    }
                  ?>
                </div>

                <label for="product_name" class="form-label text-secondary mb-3">Product name</label>
                <input type="text" name="product_name" class="form-control mb-3" value="<?=$product_details['product_name'] ?>" required autofocus>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="price" class="form-label text-secondary mb-3">Price</label>
                        <div class="input-group">
                            <div class="input-group-text">$</div>
                            <input type="number" name="price" class="form-control" value="<?=$product_details['price'] ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="quantity" class="form-label text-secondary mb-3">Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="<?=$product_details['quantity'] ?>" required>
                    </div>
                </div>

                <label for="photo" class="form-label text-secondary mb-3">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control mb-3">

                <button type="submit" name="btn_edit" class="btn btn-warning w-100 mt-4">Edit</button>

            </form>
        </div>
    </div>
    </div>
</div>

    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>