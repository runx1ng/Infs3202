<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->library('session'); //enable session
        $this->load->library('encryption');
        $this->load->model('user_model');
        $this->load->helper('text');
        $this->load->helper('string');
        
    }

    public function index()
    {
        $data['error']= "";
		$this->load->helper('form');
		$this->load->helper('url');
        $this->load->view('template/header');
		if (!$this->session->userdata('logged_in'))//check if user already login
		{
            if(get_cookie('remember')){ //check if user activate the "remember me' feature
                $username = get_cookie('username'); //get the username from cookie
                $password = get_cookie('passsword'); //get the password from cookie
                if($this->user_model->login($username, $password)){ //check username and password correct
                    $user_data = array(
                        'username' => $username,
                        'logged_in' => true //create session variable
                    );
                    $this->session->set_userdata($user_data); //set user status to login in session
                    $this->load->view('main'); //if user already logined show main page
                }
            } else{
                $this->load->view('login', $data); //if user has not login ask user to login
            }
		}else{
            $this->load->view('main'); //if user already logined show main page
            $this->load->view('videos');
		}
		$this->load->view('template/footer');
    }

    public function check_login()
    {
        $this->load->model('user_model'); //load user model
        $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or password!! </div> ";
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('template/header');
        $username = $this->input->post('username'); //getting username from login form
        $password = $this->input->post('password'); //getting password from login form
        $remember = $this->input->post('remember'); //getting remember checkbox from login form
        $captcha_response = trim($this->input->post('g-recaptcha-response'));
        if(!$this->session->userdata('logged_in')){
            if ( $this->user_model->login($username, $password)) //check username and password
            {
                $user_data = array(
                    'username' => $username,
                    'logged_in' => true //create session varaible
                );
                if($remember){ //if remember me is activated create cookie
                    echo $remember.'cookie';
                    set_cookie("username", $username, '300'); //set cookie username
                    set_cookie("password", $password, '300'); //set cookie password
                    set_cookie("remember", $remember, '300'); //set cookie remember
                }
                $this->session->set_userdata($user_data);//set user status to login in session
                redirect('login'); //direct user home page
            }else
            {
                $this->load->view('login', $data);
            }
        }else
        {
            {
            redirect('login'); //if user already logined direct user to home page
            }
        }
        $this->load->view('template/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in'); //delete login status
        redirect('login'); // redirect user back to login
    }

}
?>