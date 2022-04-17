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
</head>

<body class="">

    <!-- Variables -->
    <?php $id = $this->session->userdata('id_usuarios'); ?>
    <?php $medicamentos = $this->session->userdata('tabla'); ?>

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
                                                        <th>Horario</th>
                                                        <th>Via de aplicación</th>
                                                        <th>Fecha de inicio</th>
                                                        <th>Fecha de fin</th>
                                                    </tr>
                                                </thead>
                                                <!--
                                                <tbody>
                                                    <?php foreach ($medicamentos as $table) { ?>
                                                        <tr>
                                                            <td><?php echo $table->nombre_medi; ?></td>
                                                            <td><?php echo $table->dosis; ?></td>
                                                            <td><?php echo $table->horario; ?></td>
                                                            <td><?php echo $table->via_apli; ?></td>
                                                            <td><?php echo $table->fecha_i; ?></td>
                                                            <td><?php echo $table->fecha_f; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                    -->
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

<script>
    function getPlanning_fromDate(sDate, eDate) {

        $.ajax({
            url: "<?php echo site_url('principal_controller/getMedicamentos'); ?>",
            method: "POST",
            data: {
                id: '<?php echo $id; ?>'
            },
            async: true,
            dataType: 'json',
            success: function(data) {

                console.log(data)
                var table = document.querySelector('#datatable2')
                hideRows_OfTable(table)
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {

                        appendHTML_TR(data[i].nombre_medi, data[i].dosis, data[i].horario, data[i].via_apli, data[i].fecha_i, data[i].fecha_f, table)
                    }
                }
            },
            error: function(request, status, error) {

                var val = request.responseText;
                alert("error" + val + error);
            }
        });
    }

    function hideRows_OfTable(table) {

        if (table.rows.length > 1) {
            for (let i = 1; i < table.rows.length; i++) {

                table.rows[i].style.display = 'none';
                table.rows[i].classList.add("noExl");
            }
        }
    }

    function appendHTML_TR(nombre_medi, dosis, horario, via_apli, fecha_i, fecha_f, tableID) {
        var tr_HTML = `
		<tr  >
			<td>${nombre_medi}</td>
			<td>${dosis}</td>
			<td>${horario}</td>
			<td>${via_apli}</td>
			<td>${fecha_i} </td>
			<td>${fecha_f} </td>
		</tr>`
        tableID.insertAdjacentHTML('beforeend', tr_HTML)
    }

    function replaceBlank(str) {
        let newStr = str.trim()
        newStr = newStr.replaceAll(" ", "%20");
        return newStr
    }
</script>