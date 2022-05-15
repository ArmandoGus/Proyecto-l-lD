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

	public function sesionInicio(){
		$this->load->view('users/login');
	}

	public function registrer_view()
	{
		$this->load->view('users/registrer');
	}

	public function poliapp()
	{
		$this->load->view('main/principal');
	}

	public function vista_terminos(){
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
}
