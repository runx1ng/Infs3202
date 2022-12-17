<div class="center">
    <div class="lgcontainer">
        <?php echo form_open(base_url().'forgot/ForgotPassword'); ?>
        <div class="text">Forgot Password</div>
        <?php
        if($this->session->flashdata('message')){
            echo '
            <div class="success">
            '.$this->session->flashdata("message").'
            </div>
            ';
        }
        ?>
        <form action="#">
            <div class="data">
                <label>Enter Email</label>
                <input type="text" required="required" name="email">
            </div>
            <div class="btn">
                <div class="inner"></div>
                <button type="submit">submit</button>
            </div>
            <div class="sign-up">Already have an account? <a href="login">Login</a></div>
			</div>   
        </form>
        <?php echo form_close(); ?>
    </div>
</div>