<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>PoliApp</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Wolfteq S&T" />

    <!--Icon cabecera-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/iconoPrincipal.png" type="image/x-icon">

    <!-- css de esta página -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/calendario/principal.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,500;1,700&display=swap" rel="stylesheet">

    <!-- vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <script src="<?php echo base_url(); ?>assets/js/vendor-all.min.js"></script>

    <!-- data tables css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/responsive.bootstrap4.min.css">
</head>

<body class="">


    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed ">

        <div class="collapse navbar-collapse fondo_nav">
            <img src="<?php echo base_url(); ?>assets/images/iconoPrincipal.png" alt="" class="logo" width="60px" height="60px">
            <h1 class="textop">PoliApp</h1>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url(); ?>assets/images/usuario.png" alt="User-Profile-Image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <ul class="pro-body">
                                <li><a href="<?php echo base_url(); ?>users/logout_user" class="dropdown-item"><i class="feather icon-lock"></i> Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

            </ul>
        </div>

    </header>
    <!-- [ Header ] end -->


    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container all">
        <div class="pcoded-content container">
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ Dashboard ] start -->
                <div class="col-sm-12">

                    



                </div>
                <!-- [ Dashboard ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

    <!-- Required Js -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pcoded.min.js"></script>



</body>

</html>