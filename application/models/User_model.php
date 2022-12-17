<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here 
    Class User_model extends CI_Model{
        //log in
        public function login($username, $password){
            // construct sql query
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            // making query
            $query = $this->db->get('users');
            $q = "select password from users where username = '$username'";
            $getemail = "select is_email_verified from users where username = '$username'";
            $result = $this->db->query($q)->row();
            $emailResult = $this->db->query($getemail)->row();
            $new = '';
            if($result){
                $new = $result->password;
                $store_password = $this->encryption->decrypt($new);
            }


            if($query->num_rows() >= 0 && $emailResult->is_email_verified == 'yes'){
                // $row = $query->result();
                // echo "$new";
                // echo $store_password;
                // echo $password;
                // $store_password = $this->encryption->decrypt($new);
                if($password == $store_password){
                    echo "$new";
                    return true;
                }else{
                    $this->session->set_flashdata('errorMessage', 'Wrong Password!');
                }
                // foreach($query->result() as $row){
                //     if($row->is_email_verified == 'yes'){
                //         $store_password = $this->encryption->decrypt($row->password);
                //         if($password == $store_password){
                //             return true;
                //         }
                //     }else{
                //         return 'First verified your email address';
                //     }
                // }
                // return true;
            } else {
                $this->session->set_flashdata('errorMessage', 'Please verify your email first');
                // echo "Please verify your email"; //return false
            }
        }

        public function ForgotPassword($email){
            $this->db->select('email');
            $this->db->from('users'); 
            $this->db->where('email', $email); 
            $query=$this->db->get();
            return $query->row_array();
        }

        public function sendpassword($data){
            $email = $data['email'];
            $query1=$this->db->query("SELECT *  from users where email = '".$email."' ");
            $row=$query1->result_array();
            if($query1->num_rows() > 0){
                $passwordplain = "";
                $passwordplain  = rand(999999999,9999999999);
                $newpass['password'] =  $this->encryption->encrypt($passwordplain);
                $this->db->where('email', $email);
                $this->db->update('users', $newpass); 
                $mail_message='Dear '.$row[0]['username'].','. "\r\n";
                $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
                $mail_message.='<br>Please Update your password.';
                $mail_message.='<br>Thanks & Regards';
                $mail_message.='<br>FunVid'; 

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
                $this->email->message($mail_message);
                if($this->email->send()){
                    $this->session->set_flashdata('message', 'New password has sent to your email!');
                    redirect('forgot');
                }
            }
        }

    
    }
?>