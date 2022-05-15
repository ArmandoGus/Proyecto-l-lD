<?php
defined('BASEPATH') or exit('No direct script access allowed');

class principal_controller extends CI_Controller
{

	public function doctor()
	{
		$this->load->model('principal_model');
		$id = $this->session->userdata('id_usuarios');
		$data['doctores'] = $this->principal_model->get_docto($id);
		$this->load->view('main/info_doctor', $data);
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

	public function add_doctores()
	{
		$this->load->model('principal_model');
		$id = $this->session->userdata('id_usuarios');
		$this->load->view('funciones/agregar_doctores', $id);
	}

	public function select()
	{

		$this->load->model('principal_model');
		$id = $this->input->get('id');

		$data['result'] = $this->principal_model->select($id);

		$this->load->view('funciones/editar', $data);
	}

	public function select_doctor()
	{

		$this->load->model('principal_model');
		$id = $this->input->get('id');

		$data['result'] = $this->principal_model->select_doctor($id);

		$this->load->view('funciones/editar_doctores', $data);
	}

	public function delete()
	{

		$this->load->model('principal_model');
		$id = $this->input->get('id');
		$this->principal_model->delete($id);

		redirect(base_url('principal_controller/cargar_medi'));
	}

	public function delete_doctor()
	{
		$this->load->model('principal_model');
		$id = $this->input->get('id');
		$this->principal_model->delete_doctor($id);
		redirect(base_url('principal_controller/doctor'));
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

	public function insert_doctor()
	{
		$this->load->model('principal_model');
		$id = $this->session->userdata('id_usuarios');

		$data = array(

			'id_usuario' => $id,
			'nombre_doc' => $_POST['name_doctor'],
			'correo_ED' => $_POST['correo_doc'],
			'num_telefono' => $_POST['telefono_doctor']

		);

		$this->principal_model->insert_doctor($data);

		redirect(base_url('principal_controller/doctor'));
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

	public function update_doctor()
	{
		$this->load->model('principal_model');
		$id = $this->input->get('id');

		$data = array(

			'nombre_doc' => $_POST['name_doctor'],
			'correo_ED' => $_POST['correo_doc'],
			'num_telefono' => $_POST['telefono_doctor']

		);

		$this->principal_model->update_doctor($id, $data);
		redirect(base_url('principal_controller/doctor'));
	}
}
