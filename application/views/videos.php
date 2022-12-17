<html>
<head>
    <title>main</title>
    <meta charset="UTF-8">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
</head>
<body>
<script type="text/javascript">
    $(window).scroll(function() {
    sessionStorage.scrollTop = $(this).scrollTop();
    });

    $(document).ready(function() {
    if (sessionStorage.scrollTop != "undefined") {
        $(window).scrollTop(sessionStorage.scrollTop);
    }
    });
</script>
<div class="center">

    <?php
        $dirname = './uploads/';
        $images = glob($dirname."*.JPG");
        $videos = glob($dirname."*.mp4");
        foreach($images as $image) {
            echo '<img src="'.$image.'" /><br />';
        }

        foreach($videos as $video) {
            // $username = $this->session->userdata('username');
            $video_name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $video);
            $video_name1 = str_replace('uploads', '', $video_name);
            $video_name2 = str_replace('mp4', '', $video_name1);
            echo '
            <form method="post" action="https://infs3202-69529d5e.uqcloud.net/project/load_video/get_videos">
                <div class="video_card">
                    <video class="video" width="320" height="240" posistion="relative" controls>
                        <source src= '.$video.' type="video/mp4">
                    </video>
                    <div class="description">
                        <input type="hidden" value='.$video.' name="video">
                        <button type="submit" value='.$video.'>'.$video.'</button>
                    </div>
                </div>    
            </form>
            <br /><br /><br />';
        }
        

        //Auto logout
        if($_SESSION['loginTime']+20>time()){ //auto logout
        
            $_SESSION['loginTime']=time();
        
        }else{
        
            $this->session->unset_userdata('logged_in'); //delete login status
            redirect('login'); // redirect user back to login
        
            exit;
        
        }

    ?>
</div>
</body>
</html>

