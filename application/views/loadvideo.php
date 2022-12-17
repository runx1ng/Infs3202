<?php if(isset($path))
    $newpath = str_replace('./uploads/', 'https://infs3202-69529d5e.uqcloud.net/project/uploads/', $path);
    // echo $newpath;
?>

<div class="">
    <video class="video" width="640" height="480" posistion="relative" controls>
        <source src= '<?php echo $newpath; ?>' type="video/mp4">
    </video>
    <div>
        Uploader: <?php if(isset($user))echo $user->username;?>
        <form method="post" action="https://infs3202-69529d5e.uqcloud.net/project/load_video/get_videos">
            <input type="hidden" value='<?php echo $newpath; ?>' name="vote">
            <button type="submit" value='<?php echo $newpath; ?>'>Like</button>
            <div>
                Comments:
                <br>
                <?php if(isset($comments))
                    foreach($comments as $row){
                echo "
                <tr>
                    <p style=margin:0px>$row->comment_name: </p>
                    <td>$row->comment</td>
                    
				</tr>
			";
            }?>
            </div>
            <input type="text" name="comment">
            <button type="submit" value='<?php echo $newpath; ?>'>Post comment</button>
        </form>
    </div>
    <div>
        Votes: <?php if(isset($votes))echo $votes->votes;?>
    </div>
    <!-- <div class="description">
        <a href="load_video/'.$video.'"><p>'.$video_name2.'</p></a>
    </div> -->
</div>    