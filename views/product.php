<?php

include "../classes/product.php";
session_start();

$product = new Product;
$product_list = $product->getAllProducts($_SESSION['id']);



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>

  <div class="container-fluid" style="padding-top: 80px">
    <div class="row display-4">
        <div class="col-sm-1"><a href="../views/dashboard.php"><i class="fa-solid fa-house text-dark"></i></a></div>
        <div class="col-sm-10 text-center text-secondary display-6 fw-bold">Welcome, <?= $_SESSION['username'] ?></div>
        <div class="col-sm-1"><a href="../actions/logout.php"><i class="fa-solid fa-user-xmark text-danger"></i></a></div>
    </div>

    <div class="container" style="padding-top: 80px">
      <div class="row">
        <h2 class="col-6 fw-bold display-6 mb-4">Product List</h2>
        <a class="col-6 text-end" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-plus text-info display-6"></i></a>
          
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="padding: 3rem;">
                    <button type="button" class="btn-close m-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-header border-0 text-center mx-auto">
                      <h5 class="modal-title text-info display-5 fw-bold" id="exampleModalLabel"><i class="fa-solid fa-box text-info"></i> Add Product</h5>
                    </div>
                    <div class="modal-body">
                      <form action="../actions/add-product.php" method="post" enctype="multipart/form-data">
                        <label for="product_name" class="form-label text-secondary mb-3">Product name</label>
                        <input type="text" name="product_name" class="form-control mb-3" required autofocus>
                      
                        <div class="row">
                          <div class="col-sm-6">
                            <label for="price" class="form-label text-secondary mb-3">Price</label>
                            <div class="input-group">
                              <div class="input-group-text">$</div>
                              <input type="number" name="price" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label for="quantity" class="form-label text-secondary mb-3">Quantity</label>
                            <input type="number" name="quantity" class="form-control" required>
                          </div>
                        </div>

                        <!-- image -->
                        <input type="file" name="photo" id="photo" class="form-control my-3">
                        <!-- button -->
                        <button type="submit" name="btn_add" class="btn btn-info w-100 mt-4">Add</button>
                      </form>
                    </div>
                </div>
              </div>
            </div>


        <table class="table table-hover fs-5">
            <thead class="bg-dark text-white">
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Photo</th>
                <th></th>
                <th></th>
            </thead>

            <tbody class="lead">
              <?php
                while($product_details = $product_list->fetch_assoc()){
                  $quantity = $product_details['quantity'];
              ?>
              <tr>
                <td><?= $product_details['id'] ?></td>
                <td><?= $product_details['product_name'] ?></td>
                <td><?= $product_details['price'] ?></td>
                <td><?= $product_details['quantity'] ?></td>
                <td>
                  <?php 
                  if(!empty($product_details['photo'])){
                  ?>
                    <img src="../assets/images/<?= $product_details['photo'] ?>" alt="<?= $product_details['photo'] ?>" style="width: 5rem; height: 5rem;">
                  <?php
                    }else{
                  ?>
                    <i class="fa-solid fa-image fw-3"></i>                 
                  <?php
                    }
                  ?>
                </td>
                <td>
                  <a href="edit-product.php?product_id=<?php echo $product_details['id'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                  <a href="delete-product.php?product_id=<?php echo $product_details['id'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>

                <td>
                  <?php
                  if($quantity > 1){ ?>
                    <a href="buy-product.php?product_id=<?php echo $product_details['id'] ?>" class="btn btn-success"><i class="fa-solid fa-cash-register"></i></a>
                <?php 
                  }elseif($quantity == 0){

                  }
                ?>
                  </td>
              </tr>
              <?php
                }
              ?>            
          </tbody>
        </table>
    </div>
  </div>
    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>