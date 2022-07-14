<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>

  <div style="height: 100vh">
    <div class="row h-100 m-0">
    <div class="card my-auto mx-auto border-0" style="width: 45%;">
        <div class="card-header border-0 bg-transparent">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <h1 class="text-primary fw-bold display-3 text-center">LOGIN <i class="fa-solid fa-right-to-bracket"></i></h1>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="../actions/login.php" method="post">
                <div class="row">
                    <label for="username" class="col-sm-2 col-form-label text-secondary mb-3">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" required autofocus>
                    </div>
                </div>

                <div class="row">
                    <label for="password" class="col-sm-2 col-form-label text-secondary mb-3">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10 text-end">
                        <button type="submit" name="btn_login" class="btn btn-primary text-white w-100">Login</button>
                    </div>
                </div>
            </form>
            
            <!-- Button trigger modal -->
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <div class="text-center">
                        <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Create an Account</button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="padding: 3rem;">
                    <button type="button" class="btn-close m-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-header border-0 text-center mx-auto">
                        <h5 class="modal-title text-danger display-5 fw-bold" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i> Registration</h5>
                    </div>
                    <div class="modal-body">
                        <form action="../actions/register.php" method="post">
                            <div class="row">
                                <div class="col">
                                    <label for="first_name" class="form-label text-secondary my-3">First Name</label>
                                    <input type="text" name="first_name" class="form-control" required autofocus>
                                </div>
                                <div class="col">
                                    <label for="last_name" class="form-label text-secondary my-3">Last name</label>
                                    <input type="text" name="last_name" class="form-control" required>
                                </div>
                            </div>

                            <label for="username" class="form-label text-secondary my-3">Username</label>
                            <input type="text" name="username" class="form-control" required>

                            <label for="password" class="form-label text-secondary my-3">Password</label>
                            <input type="password" name="password" class="form-control" required>

                            <button type="submit" class="btn btn-danger text-white w-100 mt-3">Register</button>
                    </div>
                    </form>
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