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

    <!--
    <style data-emotion="css"></style>
    <style>
        
        html * {

            background: rgba(255, 0, 0, .1);
            box-shadow: 0 0 0 1px red;
        }

    </style>
    -->

    <style>
        .flecha {
            display: inline;
        }

        .contenedor {
            position: relative;
        }

        .aa {
            position: absolute;
            left: auto;
            top: 5px;
        }
    </style>
</head>

<body class="">
    <!-- Variables -->
    <?php $id = $this->session->userdata('id_usuarios'); ?>

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

                    <div class="col-sm-12 contenedor">
                        <a href="<?php echo base_url(); ?>users/poliapp">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up flecha" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" />
                            </svg>
                        </a>
                        <h1 class="bienvenido flecha aa">Control de Medicamentos</h1>

                    </div>



                    <div class="row">
                        <!-- [ basic-table ] start -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body table-border-style">
                                    <div class="table-responsive">
                                        <table id="datatable1" class="table">
                                            <div class="container">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre del medicamento</th>
                                                        <th>Dosis</th>
                                                        <th>Horario</th>
                                                        <th>Via de aplicación</th>
                                                        <th>Fecha de inicio</th>
                                                        <th>Fecha de fin</th>
                                                        <th><a href="<?php echo base_url(); ?>principal_controller/add/?id=<?php echo $id; ?>"><button type="button" class="btn btn-success button"><i class="fas fa-plus"></i></button>
                                                            </a></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($medicamentos as $row) { ?>
                                                        <tr>
                                                            <td><?php echo $row->nombre_medi; ?></td>
                                                            <td><?php echo $row->dosis; ?></td>
                                                            <td><?php echo $row->horario; ?></td>
                                                            <td><?php echo $row->via_apli; ?></td>
                                                            <td><?php echo $row->fecha_i; ?></td>
                                                            <td><?php echo $row->fecha_f; ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url()  ?>principal_controller/select/?id=<?= $row->id_medicamento;  ?>"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                                                                <a href="<?php echo base_url()  ?>principal_controller/delete/?id=<?= $row->id_medicamento;  ?>" onclick="return confirm('¿Estás seguro de eliminar este medicamento?');"><button type="button" class="btn btn-danger confirm-delete"><i class="fas fa-trash-alt"></i></button></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



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

<script>

</script>