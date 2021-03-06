<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin FCTs - Empresas</title>

    <!-- Custom fonts for this template-->
    <link rel="icon" type="image/png" href="imgs/favicon/agenda.png">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body id="page-top">    <link rel="icon" type="image/png" href="imgs/favicon/agenda.png">
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
                        <h1 class="h3 mb-0 text-gray-800">Empresas</h1>
                    </div>
                    <div id="msg-alert" class="fixed-bottom text-right mr-3 p-2 msg-alert">
<!--                        <p>MENSAJE</p>-->
                    </div>
                    <div class=" justify-content-end botones" style="right: 0">
                        <div class="">
                            <!--                        <div class="btn-group  mb-4 pr-2" role="group" aria-label="Button group with nested dropdown">-->
                            <div class="btn-group m-2" role="type" aria-label="type of data">
                                <button id="list" type="button" class="btn btn-light shadow-sm"><i class="fa fa-th-list"></i></button>
                                <button id="gallery" type="button" class="btn btn-light shadow-sm"><i class="fa fa-th"></i></button>
                            </div>
                            <!--                            <button id="gallery" type="button" class="btn btn-light shadow-sm">Añadir Contacto <i class="fas fa-user"></i></button>-->

                            <div class="btn-group m-2" role="empresas" aria-label="">
                                <a href="add-empresa.php" class="btn btn-light shadow-sm ">Añadir Empresa <i class="fas fa-user"></i></a>
                                <button class="btn btn-light  dropdown-toggle btn-sm  shadow-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acción
                                </button>
                                <div class="dropdown-menu animated--fade-in " aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" id="btnEdit" href="#">Editar</a>
                                    <a class="dropdown-item" id="btnDelete" href="#">Borrar</a>
                                </div>
                            </div>
                            <a href="pdf-empresa.php?search=" id="pdf" class="m-2  d-inline-block btn btn-sm btn-primary shadow-sm "><i class="fas fa-download fa-sm text-white-50"></i> Generar PDF</a>
                        </div>
                    </div>
                </div>

                <!--                <div class="mb-4">-->
                <!--                    <div class="d-block">-->
                <!--                        <h1 class="h3 mb-0 text-gray-800">Contactos</h1>-->
                <!--                    </div>-->
                <!--                    <div class="d-block position-relative " style="right: 0">-->
                <!--                        <div class="botones">-->
                <!--                        <div class="btn-group  mb-4 pr-2" role="group" aria-label="Button group with nested dropdown">-->
                <!--                            <div class="btn-group m-2" role="type" aria-label="type of data">-->
                <!--                                <button id="list" type="button" class="btn btn-light shadow-sm"><i class="fa fa-th-list"></i></button>-->
                <!--                                <button id="gallery" type="button" class="btn btn-light shadow-sm"><i class="fa fa-th"></i></button>-->
                <!--                            </div>-->
                <!--                            <button id="gallery" type="button" class="btn btn-light shadow-sm">Añadir Contacto <i class="fas fa-user"></i></button>-->

                <!--                            <div class="btn-group m-2" role="contactos" aria-label="">-->
                <!--                                <a href="add-contact.php" class="btn btn-light shadow-sm ">Añadir Contacto <i class="fas fa-user"></i></a>-->
                <!--                                <button class="btn btn-light  dropdown-toggle btn-sm  shadow-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--                                    Acción-->
                <!--                                </button>-->
                <!--                                <div class="dropdown-menu animated--fade-in " aria-labelledby="dropdownMenuButton">-->
                <!--                                    <a class="dropdown-item" id="btnEdit" href="#">Editar</a>-->
                <!--                                    <a class="dropdown-item" id="btnDelete" href="#">Borrar</a>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <a href="pdf.php?search=" id="pdf" class="m-2  d-inline-block btn btn-sm btn-primary shadow-sm "><i class="fas fa-download fa-sm text-white-50"></i> Generar PDF</a>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->



                <!-- Contact List -->
                <div class="row">

                    <div class="col-md-12 table-container">
                        <div id="listaEmpresas" class=""></div>
                    </div>
                </div>


                <!-- Content Row -->
                <!--<div class="row">-->

                <!--&lt;!&ndash; Earnings (Monthly) Card Example &ndash;&gt;-->
                <!--<div class="col-xl-3 col-md-6 mb-4">-->
                <!--<div class="card border-left-primary shadow h-100 py-2">-->
                <!--<div class="card-body">-->
                <!--<div class="row no-gutters align-items-center">-->
                <!--<div class="col mr-2">-->
                <!--<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>-->
                <!--<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>-->
                <!--</div>-->
                <!--<div class="col-auto">-->
                <!--<i class="fas fa-calendar fa-2x text-gray-300"></i>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->

                <!--&lt;!&ndash; Earnings (Monthly) Card Example &ndash;&gt;-->
                <!--<div class="col-xl-3 col-md-6 mb-4">-->
                <!--<div class="card border-left-success shadow h-100 py-2">-->
                <!--<div class="card-body">-->
                <!--<div class="row no-gutters align-items-center">-->
                <!--<div class="col mr-2">-->
                <!--<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>-->
                <!--<div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>-->
                <!--</div>-->
                <!--<div class="col-auto">-->
                <!--<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->

                <!--&lt;!&ndash; Earnings (Monthly) Card Example &ndash;&gt;-->
                <!--<div class="col-xl-3 col-md-6 mb-4">-->
                <!--<div class="card border-left-info shadow h-100 py-2">-->
                <!--<div class="card-body">-->
                <!--<div class="row no-gutters align-items-center">-->
                <!--<div class="col mr-2">-->
                <!--<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>-->
                <!--<div class="row no-gutters align-items-center">-->
                <!--<div class="col-auto">-->
                <!--<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>-->
                <!--</div>-->
                <!--<div class="col">-->
                <!--<div class="progress progress-sm mr-2">-->
                <!--<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="col-auto">-->
                <!--<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->

                <!--&lt;!&ndash; Pending Requests Card Example &ndash;&gt;-->
                <!--<div class="col-xl-3 col-md-6 mb-4">-->
                <!--<div class="card border-left-warning shadow h-100 py-2">-->
                <!--<div class="card-body">-->
                <!--<div class="row no-gutters align-items-center">-->
                <!--<div class="col mr-2">-->
                <!--<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>-->
                <!--<div class="h5 mb-0 font-weight-bold text-gray-800">18</div>-->
                <!--</div>-->
                <!--<div class="col-auto">-->
                <!--<i class="fas fa-comments fa-2x text-gray-300"></i>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->

                <!-- Content Row -->

                <!--<div class="row">-->

                <!--&lt;!&ndash; Area Chart &ndash;&gt;-->
                <!--<div class="col-xl-8 col-lg-7">-->
                <!--<div class="card shadow mb-4">-->
                <!--&lt;!&ndash; Card Header - Dropdown &ndash;&gt;-->
                <!--<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">-->
                <!--<h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>-->
                <!--<div class="dropdown no-arrow">-->
                <!--<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>-->
                <!--</a>-->
                <!--<div class="dropdown-menu dropdown-menu-right shadow animated&#45;&#45;fade-in" aria-labelledby="dropdownMenuLink">-->
                <!--<div class="dropdown-header">Dropdown Header:</div>-->
                <!--<a class="dropdown-item" href="#">Action</a>-->
                <!--<a class="dropdown-item" href="#">Another action</a>-->
                <!--<div class="dropdown-divider"></div>-->
                <!--<a class="dropdown-item" href="#">Something else here</a>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--&lt;!&ndash; Card Body &ndash;&gt;-->
                <!--<div class="card-body">-->
                <!--<div class="chart-area">-->
                <!--<canvas id="myAreaChart"></canvas>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->

                <!--&lt;!&ndash; Pie Chart &ndash;&gt;-->
                <!--<div class="col-xl-4 col-lg-5">-->
                <!--<div class="card shadow mb-4">-->
                <!--&lt;!&ndash; Card Header - Dropdown &ndash;&gt;-->
                <!--<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">-->
                <!--<h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>-->
                <!--<div class="dropdown no-arrow">-->
                <!--<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>-->
                <!--</a>-->
                <!--<div class="dropdown-menu dropdown-menu-right shadow animated&#45;&#45;fade-in" aria-labelledby="dropdownMenuLink">-->
                <!--<div class="dropdown-header">Dropdown Header:</div>-->
                <!--<a class="dropdown-item" href="#">Action</a>-->
                <!--<a class="dropdown-item" href="#">Another action</a>-->
                <!--<div class="dropdown-divider"></div>-->
                <!--<a class="dropdown-item" href="#">Something else here</a>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--&lt;!&ndash; Card Body &ndash;&gt;-->
                <!--<div class="card-body">-->
                <!--<div class="chart-pie pt-4 pb-2">-->
                <!--<canvas id="myPieChart"></canvas>-->
                <!--</div>-->
                <!--<div class="mt-4 text-center small">-->
                <!--<span class="mr-2">-->
                <!--<i class="fas fa-circle text-primary"></i> Direct-->
                <!--</span>-->
                <!--<span class="mr-2">-->
                <!--<i class="fas fa-circle text-success"></i> Social-->
                <!--</span>-->
                <!--<span class="mr-2">-->
                <!--<i class="fas fa-circle text-info"></i> Referral-->
                <!--</span>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->

                <!-- Content Row -->
                <!--<div class="row">-->

                <!--&lt;!&ndash; Content Column &ndash;&gt;-->
                <!--<div class="col-lg-6 mb-4">-->

                <!--&lt;!&ndash; Project Card Example &ndash;&gt;-->
                <!--<div class="card shadow mb-4">-->
                <!--<div class="card-header py-3">-->
                <!--<h6 class="m-0 font-weight-bold text-primary">Projects</h6>-->
                <!--</div>-->
                <!--<div class="card-body">-->
                <!--<h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>-->
                <!--<div class="progress mb-4">-->
                <!--<div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--</div>-->
                <!--<h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>-->
                <!--<div class="progress mb-4">-->
                <!--<div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--</div>-->
                <!--<h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>-->
                <!--<div class="progress mb-4">-->
                <!--<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--</div>-->
                <!--<h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>-->
                <!--<div class="progress mb-4">-->
                <!--<div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--</div>-->
                <!--<h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>-->
                <!--<div class="progress">-->
                <!--<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->

                <!--&lt;!&ndash; Color System &ndash;&gt;-->
                <!--<div class="row">-->
                <!--<div class="col-lg-6 mb-4">-->
                <!--<div class="card bg-primary text-white shadow">-->
                <!--<div class="card-body">-->
                <!--Primary-->
                <!--<div class="text-white-50 small">#4e73df</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="col-lg-6 mb-4">-->
                <!--<div class="card bg-success text-white shadow">-->
                <!--<div class="card-body">-->
                <!--Success-->
                <!--<div class="text-white-50 small">#1cc88a</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="col-lg-6 mb-4">-->
                <!--<div class="card bg-info text-white shadow">-->
                <!--<div class="card-body">-->
                <!--Info-->
                <!--<div class="text-white-50 small">#36b9cc</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="col-lg-6 mb-4">-->
                <!--<div class="card bg-warning text-white shadow">-->
                <!--<div class="card-body">-->
                <!--Warning-->
                <!--<div class="text-white-50 small">#f6c23e</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="col-lg-6 mb-4">-->
                <!--<div class="card bg-danger text-white shadow">-->
                <!--<div class="card-body">-->
                <!--Danger-->
                <!--<div class="text-white-50 small">#e74a3b</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="col-lg-6 mb-4">-->
                <!--<div class="card bg-secondary text-white shadow">-->
                <!--<div class="card-body">-->
                <!--Secondary-->
                <!--<div class="text-white-50 small">#858796</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->

                <!--</div>-->

                <!--<div class="col-lg-6 mb-4">-->

                <!--&lt;!&ndash; Illustrations &ndash;&gt;-->
                <!--<div class="card shadow mb-4">-->
                <!--<div class="card-header py-3">-->
                <!--<h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>-->
                <!--</div>-->
                <!--<div class="card-body">-->
                <!--<div class="text-center">-->
                <!--<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">-->
                <!--</div>-->
                <!--<p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>-->
                <!--<a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>-->
                <!--</div>-->
                <!--</div>-->

                <!--&lt;!&ndash; Approach &ndash;&gt;-->
                <!--<div class="card shadow mb-4">-->
                <!--<div class="card-header py-3">-->
                <!--<h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>-->
                <!--</div>-->
                <!--<div class="card-body">-->
                <!--<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>-->
                <!--<p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>-->
                <!--</div>-->
                <!--</div>-->

                <!--</div>-->
                <!--</div>-->
                <!--                <table id="tNueva" class="table display AllDataTables">-->
                <!--                    <thead>-->
                <!--                    <tr>-->
                <!--                        <th>Nombre</th>-->
                <!--                        <th>Apellido</th>-->
                <!--                        <th>Pais</th>-->
                <!--                    </tr>-->
                <!--                    </thead>-->
                <!--                    <tbody>-->
                <!--                    </tbody>-->
                <!---->
                <!--                </table>-->
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
<script src="js/lista-empresas.js"></script>


<script></script>


<script>

</script>
</body>
</html>
