<div class="center">
    <div class="lgcontainer">
        <?php echo form_open(base_url().'edit/check_edit'); ?>
        <div class="text">Profile Update</div>
        <?php
        if($this->session->flashdata('updateSuccess')){
            echo '
            <div class="success">
            '.$this->session->flashdata("updateSuccess").'
            </div>
            ';
        }
        ?>
        <form action="#">
            <div class="">
                <label>Username: </label>
                <?php $user = $this->session->userdata('username'); echo $user?>
            </div>
            <div class="data">
                <label>Old Email</label>
                <input type="text" required="required" name="oldEmail">
            </div>
            <div class="data">
                <label>Email</label>
                <input type="text" required="required" name="newEmail">
            </div>
            <div class="btn">
                <div class="inner"></div>
                <button type="submit">update</button>
            </div>
        </form>
        <?php echo form_close(); ?>
    </div>
</div>
