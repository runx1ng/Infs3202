<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load_video extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // $this->load->view('loadvideo');
        $this->load->model('Video_model');

    }

    public function index(){
        // $this->load->view('loadvideo');
        
    }

    public function get_videos(){
        
        $videopath = $this->input->post('video');
        $otherpath = str_replace('./uploads/', '/var/www/htdocs/project/uploads/', $videopath);
        $videouser = $this->Video_model->show_video($otherpath);
        $votes = $this->Video_model->show_votes($otherpath);

        $comment = $this->input->post('comment');
        $comments = $this->Video_model->show_comment($otherpath);
        
        if($videopath == '' && $comment == ''){
            $videopath = $this->input->post('vote');
            $otherpath = str_replace('https://infs3202-69529d5e.uqcloud.net/project/uploads/', '/var/www/htdocs/project/uploads/', $videopath);
            $videouser = $this->Video_model->show_video($otherpath);
            
            $this->Video_model->add_vote($otherpath);
            $votes = $this->Video_model->show_votes($otherpath);
            $comments = $this->Video_model->show_comment($otherpath);

        }else if($comment != ''){
            $videopath = $this->input->post('vote');
            $otherpath = str_replace('https://infs3202-69529d5e.uqcloud.net/project/uploads/', '/var/www/htdocs/project/uploads/', $videopath);
            $videouser = $this->Video_model->show_video($otherpath);
            $user = $this->session->userdata('username');
            $votes = $this->Video_model->show_votes($otherpath);
            $this->Video_model->add_comment($comment, $otherpath, $user);
            $comments = $this->Video_model->show_comment($otherpath);
            $votes = $this->Video_model->show_votes($otherpath);

        }
        $data = array(
            'path' => $videopath,
            'user' => $videouser,
            'votes' =>$votes,
            'comment' => $comment,
            'comments' => $comments
        );
        $this->load->view('template/header');
        $this->load->view('loadvideo', $data);
        // $this->load->view('template/footer');

        
        
    }

    public function vote(){
        // $votepath = $this->input->post('vote');
        // $otherpath = str_replace('https://infs3202-69529d5e.uqcloud.net/project/uploads/', '/var/www/htdocs/project/uploads/', $votepath);
        // $this->Video_model->add_vote($otherpath);
        // $this->load->view('template/header');
        // $this->load->view('main');
        // $this->load->view('videos');
        // $this->load->view('template/footer');
        // redirect('videos');

    }


    

    
}



?>