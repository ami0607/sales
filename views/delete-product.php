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
    <title>Delete Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>

    <div style="height: 100vh">
        <div class="row h-100 m-0">
            <div class="container" style="padding-top: 80px">
                <div class="card w-25 mx-auto border-0">
                    <div class="card-header border-0 bg-white">
                        <h2 class="text-center text-danger">DELETE PRODUCT</h2>
                    </div>
                    <div class="card-body text-center">
                        <i class="fas fa-exclamation-triangle text-warning display-4 d-block mb-2"></i>
                        <p class="fw-bold">Are you sure you want to delete "<?php echo $product_details['product_name'] ?>"?</p>

                        <div class="row">
                            <div class="col">
                                <a href="../views/product.php" class="btn btn-secondary text-white w-100">Cancel</a>
                            </div>
                            <div class="col">
                                <a href="../actions/delete-product.php?product_id=<?php echo $product_details['id'] ?>" class="btn btn-outline-danger text-danger w-100">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>