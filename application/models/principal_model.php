<?php
defined('BASEPATH') or exit('No direct script access allowed');

class principal_model extends CI_Model
{

    public function get_codes($var)
    {
        $this->db->where('id_usuario', $var);
        $query = $this->db->get('medicamentos');
        return $query->result();
    }

    public function get_docto($var)
    {
        $this->db->where('id_usuario', $var);
        $query = $this->db->get('doctores');
        return $query->result();
    }

    public function select($id)
    {
        $this->db->where('id_medicamento', $id);
        $query = $this->db->get('medicamentos');
        return $query->result();
    }

    public function select_doctor($id)
    {
        $this->db->where('id_doctor', $id);
        $query = $this->db->get('doctores');
        return $query->result();
    }

    public function delete($id)
    {
        $this->db->where('id_medicamento', $id);
        $this->db->delete('medicamentos');
        return true;
    }

    public function delete_doctor($id)
    {
        $this->db->where('id_doctor', $id);
        $this->db->delete('doctores');
        return true;
    }

    public function insert($data)
    {
        $this->db->insert('medicamentos', $data);
        return true;
    }

    public function insert_doctor($data)
    {
        $this->db->insert('doctores', $data);
        return true;
    }

    public function update($id, $data)
    {
        $this->db->where('id_medicamento', $id);
        $this->db->update('medicamentos', $data);
        return true;
    }

    public function update_doctor($id, $data)
    {
        $this->db->where('id_doctor', $id);
        $this->db->update('doctores', $data);
        return true;
    }
}
