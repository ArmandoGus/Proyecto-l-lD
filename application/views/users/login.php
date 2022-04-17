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

    <!-- vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <script src="<?php echo base_url(); ?>assets/js/vendor-all.min.js"></script>

    <style>
        .auth-wrapper {

            background-color: #e5e5f7;
            opacity: 1;
            background-image: repeating-radial-gradient(circle at 0 0, transparent 0, #e5e5f7 28px), repeating-linear-gradient(#058CE555, #058CE5);

        }


        .f-w-400 {
            color: #058CE5;
            font-family: Arial black;
            font-style: italic;
            font-size: 50px;

            text-shadow: 1px 1px 1px #0243B7,
                0px 4px 1px rgba(0, 0, 0, 0.1),
                4px 4px 5px rgba(0, 0, 0, 0.1),
                0px 0px 7px rgba(0, 0, 0, 0.1);
        }

        .card {
            border-radius: 15px;
            box-shadow: 10px 10px 15px #727272;
        }
    </style>

</head>


<body>

    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-9">

                                    <div class="text-center">
                                        <img src="<?php echo base_url(); ?>assets/images/IconoPrincipal.jpg" alt="" class="img-fluid mb-2">
                                        <h1 class="f-w-400">Bienvenido</h1>
                                    </div>

                                    <form method="post" action="<?php echo base_url(); ?>users/login_user">

                                        <div class="form-group">
                                            <label>Correo</label>
                                            <input type="email" class="form-control" name="Email" placeholder="Correo@dominio.com" required="required">
                                        </div>

                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" class="form-control" name="Password" placeholder="Contraseña" required="required">
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block mb-4">Iniciar sesión</button>
                                        </div>



                                    </form>

                                    <div class="form-group">
                                        <a href="<?php echo base_url(); ?>users/registrer_view"> <button class="btn btn-info btn-block mb-4">Registrarse</button> </a>
                                    </div>

                                    <?php
                                    if ($this->session->flashdata('error')) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <p class="text-center"> <?= $this->session->flashdata('error') ?></p>
                                        </div>
                                    <?php } ?>

                                    <?php
                                    if ($this->session->flashdata('success')) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <p class="text-center"> <?= $this->session->flashdata('success') ?></p>
                                        </div>
                                    <?php } ?>
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