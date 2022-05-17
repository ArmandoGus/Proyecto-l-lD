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

    <script>
        var date = new Date();

        date.setDate(date.getDate() - 1);

        $("#datepicker").datepicker({
            dateFormat: "dd-mm-yy",
            defaultDate: date,
            onSelect: function() {
                selectedDate = $.datepicker.formatDate("dd-mm-yy", $(this).datepicker('getDate'));
            }
        });


    </script>

    <style>
        .fondo {
            background-color: #f3f8fe;
        }

        .fondou {
            padding: 20px;
            margin-top: 25px;
            border-radius: 30px;
            box-shadow: rgba(100, 100, 111, 0.6) 0px 7px 29px 0px;
            ;
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


    <div class="auth-wrapper fondo">
        <div class="auth-content">
            <div class="card fondou">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-9">
                                    <div class="text-center">
                                        <h1 class="bienvenido">FORMULARIO</h1>
                                        </br>
                                    </div>
                                    <form method="post" action="<?php echo base_url(); ?>principal_controller/insert?id=<?php echo $id; ?>">


                                        <div class="form-group">
                                            <label>Nombre de medicamento</label>
                                            <input type="varchar" class="form-control" name="name_medic" aria-describedby="emailHelp" placeholder="Paracetamol" required="required">
                                        </div>

                                        <div class="form-group">
                                            <label>Dosis</label>
                                            <input type="number" class="form-control" name="dosisU" aria-describedby="emailHelp" placeholder="Solo escribir números aquí" required="required">
                                            <select class="form-control" name="dosisD" aria-describedby="emailHelp" required>
                                                <option disabled selected>Unidades</option>
                                                <option value="mg">mg</option>
                                                <option value="g">g</option>
                                                <option value="ml">ml</option>
                                                <option value="L">L</option>
                                                <option value="Cucharadas">Cucharadas</option>
                                                <option value="Cápsulas">Cápsulas</option>
                                                <option value="Gotas">Gotas</option>
                                                <option value="Pastillas">Pastillas</option>
                                                <option value="Microgotas">Microgotas</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Horario</label>
                                            <select class="form-control" aria-describedby="emailHelp" name="horario" required>
                                                <option disabled selected>Selecciona un horario</option>
                                                <option value="Cada 1 hora">Cada 1 hora</option>
                                                <option value="Cada 2 horas">Cada 2 horas</option>
                                                <option value="Cada 3 horas">Cada 3 horas</option>
                                                <option value="Cada 4 horas">Cada 4 horas</option>
                                                <option value="Cada 6 horas">Cada 6 horas</option>
                                                <option value="Cada 8 horas">Cada 8 horas</option>
                                                <option value="Cada 12 horas">Cada 12 horas</option>
                                                <option value="Cada 24 horas">Cada 24 horas</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Vía de administración</label>
                                            <select class="form-control" aria-describedby="emailHelp" name="via_apli" required>
                                                <option disabled selected>Selecciona la vía de administración</option>
                                                <option value="Oral">Oral</option>
                                                <option value="Ocular">Ocular</option>
                                                <option value="Ótica">Ótica</option>
                                                <option value="Nasal">Nasal</option>
                                                <option value="Cutánea">Cutánea</option>
                                                <option value="Intramuscular">Intramuscular</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Fecha de la primera toma</label>
                                            <input type="date" class="form-control" name="fecha_start" aria-describedby="emailHelp" placeholder="-" required="required" id="datepicker">
                                        </div>

                                        <div class="form-group">
                                            <label>Hora de la primera toma</label>
                                            <input type="time" class="form-control" name="fecha_end" aria-describedby="emailHelp" placeholder="-" required="required" id="datepicker">
                                        </div>

                                        <div class="text-center">
                                            <a href="<?php echo base_url(); ?>principal_controller/cargar_medi"><button type="button" class="btn btn-danger button text-center"><i class="feather mr-2 icon-x-circle"></i>Cancelar</button></a>
                                            <button type="submit" class="btn btn-success button text-center"><i class="feather mr-2 icon-check-circle"></i>Agregar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Required Js -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pcoded.min.js"></script>



</body>

</html>