<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users_model extends CI_Model {

	public function registrer_user($data)
    {
        $this->db->insert('usuarios',$data);
    }

    public function login_user($Password,$Email)
    {
        $query = $this->db->query("SELECT * FROM usuarios WHERE password='$Password'
            AND correo='$Email' ");

            if($query->num_rows()==1)
            {
                return $query->row();
            }
            else
            {
                return false;
            }

    }

    public function get_codes($var)
    {
        $this->db->where('id_usuario', $var);
        $query = $this->db->get('medicamentos');
        return $query->result();
    }

    public function selectMedi($id)
    {
        $this->db->where('id_medicamento', $id);
        $query = $this->db->get('medicamentos');
        return $query->result_array();
    }

    public function actualizaFyT($id, $data)
    {
        $this->db->where('id_medicamento', $id);
        $this->db->update('medicamentos', $data);
        return true;
    }

}
