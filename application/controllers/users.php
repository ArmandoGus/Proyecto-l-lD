<?php
defined('BASEPATH') or exit('No direct script access allowed');

class users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// load Session Library
		$this->load->library('session');

		$this->load->model('users_model');
	}

	public function index()
	{
		$this->load->view('users/principalPreview');
	}

	public function sesionInicio()
	{
		$this->load->view('users/login');
	}

	public function registrer_view()
	{
		$this->load->view('users/registrer');
	}

	public function poliapp()
	{
		$this->load->model('users_model');
		$id = $this->session->userdata('id_usuarios');
		$data['medicamentos'] = $this->users_model->get_codes($id);

		$this->load->view('main/principal', $data);
	}

	public function vista_terminos()
	{
		$this->load->view('users/TerminosCon');
	}

	public function registrer_user()
	{

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('User_Name', 'User_Name', 'required');
			$this->form_validation->set_rules('P_Name', 'P_Name', 'required');
			$this->form_validation->set_rules('M_Name', 'M_Name', 'required');
			$this->form_validation->set_rules('Email', 'Email', 'required');
			$this->form_validation->set_rules('Password', 'Password', 'required');

			if ($this->form_validation->run() == TRUE) {
				$User_Name = $this->input->post('User_Name');
				$P_Name = $this->input->post('P_Name');
				$M_Name = $this->input->post('M_Name');
				$Email = $this->input->post('Email');
				$Password = $this->input->post('Password');

				$data = array(
					'nombre' => $User_Name,
					'apellido_p' => $P_Name,
					'apellido_m' => $M_Name,
					'correo' => $Email,
					'password' => sha1($Password)
				);

				$this->load->model('users_model');
				$this->users_model->registrer_user($data);
				$this->session->set_flashdata('success', 'Usuario registrado correctamente!');
				redirect(base_url('users/sesionInicio'));
			}
		}
	}

	public function login_user()
	{

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('Email', 'Email', 'required');
			$this->form_validation->set_rules('Password', 'Passowrd', 'required');

			if ($this->form_validation->run() == TRUE) {
				$Email = $this->input->post('Email');
				$Password = $this->input->post('Password');
				$Password = sha1($Password);

				$this->load->model('users_model');
				$status = $this->users_model->login_user($Password, $Email);


				if ($status != false) {
					$id = $status->id_usuarios;
					$User_Name = $status->nombre;
					$ap = $status->apellido_p;
					$am = $status->apellido_m;
					$Email = $status->correo;


					$session_data = array(
						'id_usuarios' => $id,
						'nombre' => $User_Name,
						'apellido_p' => $ap,
						'apellido_m' => $am,
						'correo' => $Email
					);

					$this->session->set_userdata($session_data);

					redirect(base_url('users/poliapp'));
				} else {
					$this->session->set_flashdata('error', 'Correo o Contraseña incorrectos');

					redirect(base_url('users/sesionInicio'));
				}
			} else {
				$this->session->set_flashdata('error', 'Error');
				redirect(base_url('users/sesionInicio'));
			}
		}
	}

	public function logout_user()
	{
		session_destroy();
		redirect(base_url('users/index'));
	}

	public function actualizaFyT()
	{
		$this->load->model('users_model');
		$id = $this->input->get('id');
		$fe = $this->users_model->selectMedi($id);
		//echo "<script>console.log('Fecha de la toma: " . $fe[0]["fecha_i"] . "' );</script>";
		//echo "<script>console.log('Hora de la toma: " . $fe[0]["fecha_f"] . "' );</script>";
		$espaciado = " ";
		$cambio = explode($espaciado, $fe[0]["horario"]);
		//echo "<script>console.log('Valor para sumar a las horas: " . $cambio[1] . "' );</script>";
		$input =  $fe[0]["fecha_f"];
		$date = strtotime($input);
		$final = date('H:i:s', $date);
		$nuevaHora = strtotime('+' . $cambio[1] . ' hour', strtotime($final));
		$inputt =  $fe[0]["fecha_i"];
		$datee = strtotime($inputt);
		$finall = date('Y-m-d', $datee);
		$espaciadoHora = ":";
		$horacom = explode($espaciadoHora, $final);
		//echo "<script>console.log('Hora para comparar: " . $horacom[0] . "' );</script>";
		$comparador = $horacom[0];
		for ($i = 0; $i < $cambio[1]; $i++) {
			$comparador += 1;
		}
		if ($comparador >= 24) {
			$nuevaFecha = strtotime($finall . "+ 1 days");
			$data = array(
				'fecha_i' => date('Y-m-d', $nuevaFecha),
				'fecha_f' => date('H:i:s', $nuevaHora)
			);
			//echo "<script>console.log('Fecha modificada final: " . date('Y-m-d', $nuevaFecha) . "' );</script>";
		} else {
			$data = array(
				'fecha_i' => $finall,
				'fecha_f' => date('H:i:s', $nuevaHora)
			);
			//echo "<script>console.log('Fecha modificada final: " . $finall . "' );</script>";
		}
		$this->users_model->actualizaFyT($id, $data);
		redirect(base_url('users/poliapp'));

	}
}
