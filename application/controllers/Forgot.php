<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->library('session'); //enable session
        $this->load->library('encryption');
        $this->load->model('user_model');
    }

    public function index(){
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('template/header');
        $this->load->view('forgot');
        $this->load->view('template/footer');
    }

    public function ForgotPassword(){
        $email = $this->input->post('email');      
        $findemail = $this->user_model->ForgotPassword($email);  
        if($findemail){
            $this->user_model->sendpassword($findemail);        
        }else{
            $this->session->set_flashdata('message',' Email not found!');
            redirect(base_url().'login','refresh');
      }
    }
}

    

    

    




?>