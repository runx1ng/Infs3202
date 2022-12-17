<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Edit_model extends CI_Model{

    function updateProfile($newEmail, $username){
        $this->db->set('email', $newEmail);
        $this->db->where('username', $username);
        $this->db->update('users');
        // $q = "update users set email = '$newEmail' where username = '$username'";

    }
    
    function checkOldEmail($oldEmail, $username){
        $this->db->where('username', $username);
        $this->db->where('email', $oldEmail);
        $query = $this->db->get('users');
        $getemail = "select email from users where username = '$username'";
        $emailResult = $this->db->query($getemail)->row();

        if($emailResult->email == $oldEmail){
            return true;
        }else{
            // $this->session->set_flashdata('errorMessage', 'Current email does not match');
        }

    }
}