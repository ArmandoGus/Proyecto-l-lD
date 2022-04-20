<?php
defined('BASEPATH') or exit('No direct script access allowed');

class principal_controller extends CI_Controller
{

	public function doctor()
	{

		$this->load->view('main/info_doctor');
	}

	public function cargar_medi()
	{
		$this->load->model('principal_model');
		$id = $this->session->userdata('id_usuarios');
		$data['medicamentos'] = $this->principal_model->get_codes($id);
		$this->load->view('main/medicamentos_add', $data);
	}

	public function add()
	{
		$this->load->model('principal_model');
		$id = $this->session->userdata('id_usuarios');

		$this->load->view('funciones/agregar', $id);
	}

	public function select()
	{

		$this->load->model('principal_model');
		$id = $this->input->get('id');

		$data['result'] = $this->principal_model->select($id);

		$this->load->view('funciones/editar', $data);
	}

	public function delete()
	{

		$this->load->model('principal_model');
		$id = $this->input->get('id');
		$this->principal_model->delete($id);

		redirect(base_url('principal_controller/cargar_medi'));
	}

	public function insert()
	{
		$this->load->model('principal_model');
		$id = $this->session->userdata('id_usuarios');

		$data = array(

			'id_usuario' => $id,
			'nombre_medi' => $_POST['name_medic'],
			'dosis' => $_POST['dosisU'] . ' ' . $_POST['dosisD'],
			'horario' => $_POST['horario'],
			'via_apli' => $_POST['via_apli'],
			'fecha_i' => $_POST['fecha_start'],
			'fecha_f' => $_POST['fecha_end']

		);

		$this->principal_model->insert($data);

		redirect(base_url('principal_controller/cargar_medi'));
	}

	public function update()
	{
		$this->load->model('principal_model');
		$id = $this->input->get('id');

		$data = array(

			'nombre_medi' => $_POST['name_medic'],
			'dosis' => $_POST['dosisU'] . ' ' . $_POST['dosisD'],
			'horario' => $_POST['horario'],
			'via_apli' => $_POST['via_apli'],
			'fecha_i' => $_POST['fecha_start'],
			'fecha_f' => $_POST['fecha_end']

		);

		$this->principal_model->update($id, $data);
		redirect(base_url('principal_controller/cargar_medi'));
	}
}
