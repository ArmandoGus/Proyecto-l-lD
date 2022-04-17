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

    public function select($id)
    {

        $this->db->where('id_medicamento', $id);
        $query = $this->db->get('medicamentos');
        return $query->result();
    }

    public function delete($id)
    {
        $this->db->where('id_medicamento', $id);
        $this->db->delete('medicamentos');
        return true;
    }

    public function insert($data)
    {
        $this->db->insert('medicamentos', $data);
        return true;
    }
}
