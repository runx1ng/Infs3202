<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Register_model extends CI_Model{
    public function insert($data){
        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function verify_email($key){
        $this->db->where('verification_key', $key);
        $this->db->where('is_email_verified', 'no');
        $query = $this->db->get('users');
        if($query->num_rows() > 0){
            $data = array(
                'is_email_verified' => 'yes'
            );
            $this->db->where('verification_key', $key);
            $this->db->update('users', $data);
            return true;
        }else{
            return false;
        }
    }
}
