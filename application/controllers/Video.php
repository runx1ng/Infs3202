<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // $this->load->model('File_model');
		// $this->load->helper('url_helper');
    }

    public function index(){
        // $this->load->view('videos');
        // $this->load->view('load_video');
        // $videopath = $this->input->post('video');
        // $data = array(
        //     'path' => $videopath
        // );
        // // if ( file_exists(APPPATH.'views/task_b_pages_details/'.$video.'.mp4')) {
        // //     $this->load->view('uploads/'.$video);
        // //     }
        // $this->load->view('load_video', $data);
        // $data = array("records"=>null);
		// $data['records'] = $this->File_model->show_video();
		
		// $this->load->view('videos',$data);
    }




    

    
}



?>