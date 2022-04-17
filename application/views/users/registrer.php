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
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"> -->
		<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
		<meta name="description" content="" />
		<meta name="keywords" content="">
		<meta name="author" content="Codedthemes" />
		<!-- Favicon icon -->
		<link rel="icon" href="<?php echo base_url(); ?>assets/images/iconoPrincipal.png" type="image/x-icon">

		<!-- vendor css -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
		<script src="<?php echo base_url(); ?>assets/js/vendor-all.min.js"></script>

		<style>
			.auth-wrapper {
				background-color: #e5e5f7;
				opacity: 1;
				background-image: radial-gradient(circle at center center, #26AB61, #e5e5f7), repeating-radial-gradient(circle at center center, #26AB61, #26AB61, 33px, transparent 66px, transparent 33px);
				background-blend-mode: multiply;
			}

			.f-w-400 {
				color: #26AB61;
				font-family: 'Times New Roman', Times, serif;
				font-style: italic;
				font-size: 35px;
				font-weight: bold;

				text-shadow: 1px 1px 1px #10763C,
					0px 4px 1px rgba(0, 0, 0, 0.1),
					4px 4px 5px rgba(0, 0, 0, 0.1),
					0px 0px 7px rgba(0, 0, 0, 0.1);
			}

			.card {
				border-radius: 15px;
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
											<img src="<?php echo base_url(); ?>assets/images/Iconsesion.jpg" alt="" class="img-fluid mb-2">
											<h1 class="f-w-400">Registro</h1>
										</div>

										<form method="post" action="<?php echo base_url(); ?>users/registrer_user">

											<div class="form-group">
												<label>Nombre</label>
												<input type="text" class="form-control" name="User_Name" placeholder="Osvaldo" required="required">
											</div>

											<div class="form-group">
												<label>Apelido Paterno</label>
												<input type="text" class="form-control" name="P_Name" aria-describedby="emailHelp" placeholder="Serrano" required="required">
											</div>

											<div class="form-group">
												<label>Apellido Materno</label>
												<input type="text" class="form-control" name="M_Name" aria-describedby="emailHelp" placeholder="Lopez" required="required">
											</div>

											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control" name="Email" aria-describedby="emailHelp" placeholder="Correo@dominio.com" required="required">
											</div>

											<div class="form-group">
												<label>Contraseña</label>
												<input type="password" class="form-control" name="Password" aria-describedby="emailHelp" placeholder="Contraseña" required="required">
											</div>

											<button type="submit" class="btn btn-success btn-block mb-4 "><i class="feather mr-2 icon-check-circle"></i>Enviar</button>

											<?php
											if ($this->session->flashdata('success')) { ?>
												<p class="text-success"> <?= $this->session->flashdata('success') ?></p>
											<?php } ?>

										</form>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>

	</html>