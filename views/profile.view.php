<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Charts</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <?php include "views/partials/menu.partial.php";       ?>
    </ul>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include "views/partials/nav.partial.php";       ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Perfil</h1>
<!--                <p class="mb-4">Descripcion</p>-->
                <form id="upload" action="php/change-image.php" method="post" enctype="multipart/form-data">
                    <input class="d-none form-control" id="file-upload" type="file" name="file-upload">
                </form>
                <form id="profile" method="post" >
                <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12 col-lg-6 mt-4">
                            <div id="image" class="image" style="background: url('<?=$image ?>')center center"></div>
                            <div id="btn-image" class="image text-center d-flex flex-column">
                                <div class="my-auto d-block">
                                    <i class="fa fa-3x fa-camera"></i>
                                    <p class="my-auto pt-2">Cambiar Imagen</p>
                                </div>

                            </div>



                        </div>
                        <div class="col-md-12 col-lg-6 my-auto">
                            <div class="form-group d-none">
                                <label for="id">id</label>
                                <input type="text" class="form-control" id="id" name="id" value="<?=$user->getId() ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?=$user->getNombre() ?>">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Apellidos</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$user->getApellidos() ?>">
                            </div>
                        </div>

                    </div>
                    <div class="row mt-lg-5">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"  value="<?=$user->getEmail() ?>">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="date">Fecha Alta</label>
                                <input type="text" class="form-control" id="date" name="date" value="<?=$user->getFechaAlta() ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-lg-5" id="showpass">
                        <div class="col">
                            <p>Cambiar Contraseña <i id="arrow-pass" class="fa fa-sort-down"></i></p>
                        </div>
                    </div>
                    <div class="row d-none" id="changepass" >
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="oldpass">Contraseña Actual</label>
                                <input type="password" class="form-control" id="oldpass" name="oldpass">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="newpass">Contraseña Nueva</label>
                                <input type="password" class="form-control" id="newpass" name="newpass">
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col text-center mt-5">
                            <input type="submit" id="save" class="btn btn-lg btn-primary shadow-sm" value="Guardar"><!--<i class="fas fa-save fa-sm text-white-50"></i>-->
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Kevin Oltra 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script src="js/demo/chart-bar-demo.js"></script>

<!-- js profile -->
<script src="js/profile.js"></script>
</body>

</html>
