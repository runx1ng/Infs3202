<?php 
    $_SESSION['loginTime'] = time();
?>
<div class="center">
    <div class="lgcontainer">
        <?php echo form_open(base_url().'login/check_login'); ?>
        <div class="text">Login</div>
        <?php
        if($this->session->flashdata('errorMessage')){
            echo '
            <div class="error">
            '.$this->session->flashdata("errorMessage").'
            </div>
            ';
        }
        ?>
        <form action="#">
            <div class="data">
                <label>Username</label>
                <input type="text" required="required" name="username">
            </div>
            <div class="data">
                <label>Password</label>
                <input type="password" required="required" name="password">
            </div>
            <div class="forgot-pass"><a href="forgot">Forgot Password</a></div>
            <div class="g-recaptcha" data-sitekey="6Lf22NwaAAAAAAYSJ4eRsCVY8oV1-tkISxYByXae"></div>
            <div class="btn">
                <div class="inner"></div>
                <button type="submit">login</button>
            </div>
            <div>
				<label><input type="checkbox" name="remember"> Remember me</label>
			</div>   
            <div class="sign-up">Don't have an account? <a href="register">Signup Now</a></div>
        </form>
        <?php echo form_close(); ?>
    </div>
</div>