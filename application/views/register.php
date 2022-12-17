<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Register</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css">


</head>
<body>
<div class="center">
    <div class="lgcontainer">
        <div class="text">Register</div>
        <?php
        if($this->session->flashdata('message')){
            echo '
            <div class="success">
            '.$this->session->flashdata("message").'
            </div>
            ';
        }
        ?>
        <form method="post" action="<?php echo base_url();
            ?>register/validation">
            <div class="data">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo set_value('username'); ?>">
                <span class="danger"><?php echo form_error('username'); ?></span>
            </div>
            <div class="data">
                <label>Password</label>
                <input type="password" name="password">
                <span class="danger"><?php echo form_error('password'); ?></span>
            </div>
            <div class="data">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo set_value('email'); ?>">
                <span class="danger"><?php echo form_error('email'); ?></span>
            </div>
            <br>
            <div class="btn">
                <div class="inner"></div>
                <button type="submit" name="register" value="Register">Register</button>
            </div>   
            <div class="sign-up">Already have an account? <a href="login">Login Now</a></div>
        </form>
    </div>
</div>


</body>
</html>