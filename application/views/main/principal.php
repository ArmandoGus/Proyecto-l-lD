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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/calendario/calendario.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,500;1,700&display=swap" rel="stylesheet">

    <!-- vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <script src="<?php echo base_url(); ?>assets/js/vendor-all.min.js"></script>

    <!-- data tables css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/responsive.bootstrap4.min.css">

    <style>
        @import url(https://fonts.googleapis.com/css?family=Orbitron:700);

        .contenedor {
            background: white !important;
            box-shadow: rgba(100, 100, 111, 0.6) 0px 7px 29px 0px;
            border-radius: 15px;
            text-align: center;
            color: black;
            font-family: 'Orbitron', sans-serif;
            animation: all .7s;
            margin: 10%;
            padding: 10px;
            background: rgba(100, 100, 100, 0.3);
        }

        .t {
            font-size: 2em;
        }

        .timeis {
            width: 100%;
            padding: 10px;
            font-size: 3em;
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

                    <div class="row">

                        <div class="col-md-4">
                            <div class="bienvenido">
                                <p>¡HOLA BIENVENIDO!</p>
                            </div>
                            <!-- Inicio del calendario -->
                            <center>
                                <div class="calendar">
                                    <div class="calendar-header">
                                        <span class="month-picker" id="month-picker"></span>
                                        <div class="year-picker">
                                            <span id="year"></span>
                                        </div>
                                    </div>
                                    <div class="calendar-body">
                                        <div class="calendar-week-day">
                                            <div>Dom</div>
                                            <div>Lun</div>
                                            <div>Mar</div>
                                            <div>Mie</div>
                                            <div>Jue</div>
                                            <div>Vie</div>
                                            <div>Sab</div>
                                        </div>
                                        <div class="calendar-days"></div>
                                    </div>
                                </div>
                                <!-- Fin del calendario -->
                            </center>

                            <div class="contenedor">
                                <div class="t">Hora:</div>
                                <div class="timeis" id="tm"></div>
                            </div>

                            <div class="botonesBajos">
                                <a href="<?php echo base_url(); ?>principal_controller/cargar_medi"> <button type="button" class="botonP">Medicamentos</button></a>
                                <a href="<?php echo base_url(); ?>principal_controller/doctor"> <button type="button" class="botonP">Información del médico</button></a>
                            </div>

                        </div>

                        <div class="col-md-8 green">

                            <div>
                                <h1 class="bienvenido"> <?php echo "Paciente: " . $this->session->userdata('nombre') . " " . $this->session->userdata('apellido_p') . " " . $this->session->userdata('apellido_m'); ?></h1>
                            </div>

                            <!-- [ basic-table ] start -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body table-border-style">
                                        <div class="table-responsive">
                                            <table id="datatable2" class="table">

                                                <thead>
                                                    <tr>
                                                        <th>Nombre del medicamento</th>
                                                        <th>Dosis</th>
                                                        <th>Vía de administración</th>
                                                        <th>Alarma</th>
                                                        <th>Confirmar toma</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach ($medicamentos as $row) { ?>
                                                        <tr>
                                                            <td><?php echo $row->nombre_medi; ?></td>
                                                            <td><?php echo $row->dosis; ?></td>
                                                            <td><?php echo $row->via_apli; ?></td>
                                                            <td><?php echo $row->fecha_i;
                                                                echo "<br>";
                                                                echo $row->fecha_f ?></td>
                                                            <td>
                                                                <center>
                                                                    <a href="<?php echo base_url()  ?>users/actualizaFyT/?id=<?= $row->id_medicamento;  ?>"><button type="button" id="btnEnviar" class="btn btn-primary" disabled><i class="fas fa-bell"></i></button></a>
                                                                </center>
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




                </div>
                <!-- [ Dashboard ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

    <!-- Required Js -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pcoded.min.js"></script>

    <!-- Script del calendario-->
    <script src="<?php echo base_url(); ?>assets/js/calendario/calendario.js"></script>


</body>

</html>

<?php
$pointer = 0;
foreach ($medicamentos as $row) {
    $nombre_medica[$pointer] = $row->nombre_medi;
    $dosis_toma[$pointer] = $row->horario;
    $fecha_toma[$pointer] = $row->fecha_i;
    $hora_toma[$pointer] = $row->fecha_f;
    $pointer++;
}
?>

<script>
    function reloj() {
        var hoy = new Date();
        var hora = hoy.getHours();
        var minuto = hoy.getMinutes();
        var segundo = hoy.getSeconds();

        if (minuto < 10) {
            minuto = "0" + minuto;
        };

        if (segundo < 10) {
            segundo = "0" + segundo;
        };

        var ano = hoy.getFullYear();
        var mes = hoy.getMonth() + 1;
        var dia = hoy.getDate();

        if (mes < 10) {
            mes = "0" + mes;
        };

        if (dia < 10) {
            dia = "0" + dia;
        };

        //Definitivo
        let puntero = '<?= $pointer ?>';
        //console.log("Total de medicamentos: " + puntero);
        var i = 0;
        var nombre_me = <?php echo json_encode($nombre_medica); ?>;
        var dosis_tomas = <?php echo json_encode($dosis_toma); ?>;
        var fecha_tomas = <?php echo json_encode($fecha_toma); ?>;
        var hora_tomas = <?php echo json_encode($hora_toma); ?>;

        var btnEnviar = document.getElementById('btnEnviar');

        for (i = 0; i < puntero; i++) {
            var hms = hora + ":" + minuto + ":" + segundo;
            var amd = ano + "-" + mes + "-" + dia;
            var cada = dosis_tomas[i].split(' ');

            //console.log("Comparación con el array: "+hms);
            //console.log("Contenido del array en la posición " + i + ": " + dosis_tomas[i]);

            var cada = dosis_tomas[i].split(' ');
            //console.log("Contenido ya solo: " + cada[1]);

            if (hms == hora_tomas[i] && amd == fecha_tomas[i]) {
                alert("Es hora de la administración de tu medicamento: " + nombre_me[i]);
                btnEnviar.disabled = false;
            };

        }

        // console.log("\n");
        var tm = document.getElementById("tm");
        tm.textContent = (hora + ":" + minuto + ":" + segundo);

    };

    setInterval(reloj, 1000);
</script>