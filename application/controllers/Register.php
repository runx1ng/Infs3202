<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('register_model');
    }

    function index(){
        $this->load->view('register');
    }

    function validation(){
        $this->form_validation->set_rules('username', 'Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Passsword', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        if($this->form_validation->run()){
            $verification_key = md5(rand());
            $encryption_password = $this->encryption->encrypt($this->input->post('password'));
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $encryption_password,
                'email' => $this->input->post('email'),
                'verification_key' => $verification_key
            );

            $id = $this->register_model->insert($data);
            
            if($id >= 0){
                $subject = "Please verify email for login";
                $message = "
                <p>Hi ".$this->input->post('username')."</p>
                <p>This is email verification mail from FunVid Login Register system.
                For complete registeration process and login into Funvid. 
                First you want to verify your email by click this
                 <a href='".base_url()."register/verify_email/".$verification_key."'>link</a>.</p>
                 <p>Once you click this link, your email will be verified and you can login into FunVid.</p>
                 <p>Thanks</p>
                ";
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mailhub.eait.uq.edu.au',
                    'smtp_port' => 25,
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE,
                    'starttls' => TRUE,
                    'newline' => "\r\n"
                );
                $this->load->library('email', $config);
                $this->email->initialize($config);
                $this->email->from('runxing.li@uqconnect.edu.au');
                $this->email->to($this->input->post('email'));
                $this->email->subject($subject);
                $this->email->message($message);
                if($this->email->send()){
                    $this->session->set_flashdata('message', 'Check in your email for email verification mail');
                    redirect('register');
                }
            }
        }else{
            $this->index();
        }
    }

    function verify_email(){
        if($this->uri->segment(3)){
            $verification_key = $this->uri->segment(3);
            if($this->register_model->verify_email($verification_key)){
                $data['message'] = '<h1 align="center">Your Email
                has been successfully verified, now you can login from
                <a href="'.base_url().'login">here</a></h1>';
            }else{
                $data['message'] = '<h1 align="center">Invalid link</h1>';
            }
            $this->load->view('email_verification', $data);
        }
    }
}



?>