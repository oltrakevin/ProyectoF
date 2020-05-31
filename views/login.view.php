<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin FCTs - Login</title>

    <!-- Custom fonts for this template-->
    <link rel="icon" type="image/png" href="imgs/favicon/agenda.png">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-10">

        <div class="col-xl-10 col-lg-12 col-md-9 ">

            <div class="card o-hidden border-0 shadow-lg my-5">

                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!--<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
                        <div class="col-sm-12 col-lg-8 mx-auto">
                            <div class="p-5">
                                <div class="text-center">
                                    <div class="sidebar-brand-text mx-3 text-gray-900 h4"><div class="sidebar-brand-icon rotate-n-15">
                                            <i class="far fa-address-book h4"></i>
                                        </div>Admin FCT</div>
                                    <h1 class="h4 text-gray-900 mb-4">Bienvenido! </h1>

                                </div>
                                <form id="form-login" class="user">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Correo Electronico">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password">
                                    </div>
<!--                                    <div class="form-group">-->
<!--                                        <div class="custom-control custom-checkbox small">-->
<!--                                            <input type="checkbox" class="custom-control-input" id="customCheck">-->
<!--                                            <label class="custom-control-label" for="customCheck">Recordarme</label>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <!--<a href="index.php" class="btn btn-primary btn-user btn-block">-->
                                    <!--Login-->
                                    <!--</a>-->

                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                                    </div>
                                    <div class="form-group mt-2" id="errores">
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
<!--                                    <a class="small" href="forgot-password.html">Olvidaste la contraseña?</a>-->
                                </div>
                                <div class="text-center">
                                    <a class="small" href="registro.php">Create una cuenta!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>



<!-- js login-->
<script src="js/login.js"></script>

</body>
</html>
