<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here 
 class Video_model extends CI_Model{

    function show_video($path){
        $q = "select Distinct username from files where path='".$path."' ";
        $query = $this->db->query($q)->row();
        return $query;

    }

    function show_votes($path){
        $q = "select votes from files where path='".$path."'";
        $query = $this->db->query($q)->row();
        return $query;
    }

    function add_vote($path){
        $q = "update files set votes = votes + 1 where path = '".$path."' ";
        $query = $this->db->query($q);
    }

    function add_comment($comment, $path, $username){
        $q = "insert into comment (comment_id, path, comment_name, comment) values ('', '".$path."', '".$username."', '".$comment."') ";
        $query = $this->db->query($q);
    }

    function show_comment($path){
        $q = "select comment, comment_name from comment where path = '".$path."' ";
        $query = $this->db->query($q);
        return $query->result();
    }
}