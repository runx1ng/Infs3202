<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // $this->check_login();
        $this->load->model('edit_model');
    }

    public function index(){
        $this->load->view('template/header');
        $this->load->view('main');
        $this->load->view('edit');
        $this->load->view('template/footer');
    }

    public function check_edit(){
        $newEmail = $this->input->post('newEmail');
        $username = $this->session->userdata('username');
        $oldEmail = $this->input->post('oldEmail');

        $match = $this->edit_model->checkOldEmail($oldEmail, $username);

        if($match == true){
            $this->edit_model->updateProfile($newEmail, $username);
            $this->session->set_flashdata('updateSuccess', 'Update Success');
            redirect('edit');
        }
    }

    

    
}



?>