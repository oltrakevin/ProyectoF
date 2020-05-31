<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin FCTs - Contactos</title>

    <!-- Custom fonts for this template-->
    <link rel="icon" type="image/png" href="imgs/favicon/agenda.png">
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
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">
        <?php include "views/partials/menu.partial.php";       ?>
    </ul>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include "views/partials/nav.partial.php";       ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col ">
                        <h1 class="h3 mb-0 text-gray-800">Contactos</h1>
                    </div>
                    <div id="msg-alert" class="fixed-bottom text-right mr-3 p-2 msg-alert">
                        <!--                            <p>MENSAJE</p>-->
                    </div>
                    <div class=" justify-content-end botones" style="right: 0">
                        <div class="">
    <!--                        <div class="btn-group  mb-4 pr-2" role="group" aria-label="Button group with nested dropdown">-->
                                <div class="btn-group m-2" role="type" aria-label="type of data">
                                    <button id="list" type="button" class="btn btn-light shadow-sm"><i class="fa fa-th-list"></i></button>
                                    <button id="gallery" type="button" class="btn btn-light shadow-sm"><i class="fa fa-th"></i></button>
                                </div>
    <!--                            <button id="gallery" type="button" class="btn btn-light shadow-sm">Añadir Contacto <i class="fas fa-user"></i></button>-->

                                <div class="btn-group m-2" role="contactos" aria-label="">
                                    <a href="add-contacto.php" class="btn btn-light shadow-sm ">Añadir Contacto <i class="fas fa-user"></i></a>
                                    <button class="btn btn-light  dropdown-toggle btn-sm  shadow-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acción
                                    </button>
                                    <div class="dropdown-menu animated--fade-in " aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" id="btnEdit" href="#">Editar</a>
                                        <a class="dropdown-item" id="btnDelete" href="#">Borrar</a>
                                    </div>
                                </div>
                            <a href="pdf-contactos.php?search=" id="pdf" class="m-2  d-inline-block btn btn-sm btn-primary shadow-sm "><i class="fas fa-download fa-sm text-white-50"></i> Generar PDF</a>
                        </div>
                    </div>
                </div>

                <!-- Contact List -->
                <div class="row">

                    <div class="col-md-12 table-container">
                        <div id="listaContactos" class=""></div>
                    </div>
                </div>

                <!--</table>-->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include "views/partials/footer.partial.php";       ?>

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


<!---- My Scripts ---->
<!-- DataTables -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>

<!-- Show Table -->
<script src="js/lista-contactos.js"></script>


</body>
</html>
