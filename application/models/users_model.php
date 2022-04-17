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

    

}
