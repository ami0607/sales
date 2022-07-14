<?php
session_start();

include "../classes/product.php";

$buy_quantity = $_POST['quantity'];

$product = new Product;
$product_details = $product->getProduct($_GET['product_id']); //url name, get it from database
$price = $product_details['price'];
$maximum = $product_details['quantity'];

//total, quantity, maximumのmethodを記載
// $product->set_values($buy_quantity, $price, $maximum);
// $product->get_buy_quantity();
// $product->get_price();
// $product->get_maximum();
// $product->totalPrice();

$totalPrice = $buy_quantity * $price;




?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>

  <div class="container-fluid" style="padding-top: 80px">
    <div class="row display-4">           
        <div class="col-sm-1"><a href="buy-product.php?product_id=<?php echo $product_details['id'] ?>"><i class="fa-solid fa-angle-left text-dark"></i></a></div>
        <div class="col-sm-10"></div>
        <div class="col-sm-1"><a href="../actions/logout.php"><i class="fa-solid fa-user-xmark text-danger"></i></a></div>
    </div>

    <div class="container">
    <div class="card my-auto mx-auto border-0" style="width: 40%;">
        <div class="card-header border-0 bg-transparent">
            <h1 class="text-success fw-bold display-3 text-center"><i class="fa-solid fa-hand-holding-dollar"></i> Payment</h1>
        </div>
        <div class="card-body">
            <?php ?>
            <form action="../actions/payment.php?product_id=<?php echo $product_details['id'] ?>" method="post">
                <div class="row">
                    <div class="col-6"></div>
                    <label for="product_name" class="form-label text-secondary mb-3">Product name</label>
                    <div name="product_name" class="mb-3 fw-bold fs-3"><?= $product_details['product_name'] ?></div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="total_price" class="form-label text-secondary mb-3">Total Price</label>
                        <div name="total_price" class="mb-3 fw-bold fs-3">$ <?php echo $totalPrice; ?></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="quantity" class="form-label text-secondary mb-3">Buy Quantity<span class="text-danger">*</span></label>
                        <input type="hidden" name="buy_quantity" value="<?php echo $buy_quantity;  ?>"> 
                        <!-- 値をsendするためにinput -->
                        <div class="mb-3 fw-bold fs-3"><?php echo $buy_quantity;  ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6"></div>                   
                    <div class="col-sm-6 text-danger">
                        Maximum of <?php echo $maximum; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="payment" class="form-label text-secondary my-3">Payment</label>
                    </div>
                    <div class="col-sm-6"></div>  
                </div>

                <div class="input-group w-75 mx-auto">
                    <div class="input-group-text">$</div>
                    <input type="number" name="payment" min="<?php echo $totalPrice ?>" class="form-control mx-auto" required>
                </div>

                <button type="submit" name="btn_pay" class="btn btn-success w-100 mt-4">Pay</button>

            </form>
            <?php ?>
        </div>
    </div>
    </div>

    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>