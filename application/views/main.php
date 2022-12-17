<html>
<head>
    <title>main</title>
    <meta charset="UTF-8">
</head>
<body>
<style type="text/css">
    #menuBar {
        position: absolute;
        left: -260px;
        width: 260px;
        top: 100px;
        border: 1px solid black;
    }

    #glider {
        position: absolute;
        left: 260px;
        top: 250px;
        width: 80px
    }

    .glideText {
        font-size: 18px;
        color: #E2E2E2;
        text-decoration: none;
    }

    #glidetextLink {
        background: url('assets/img/sidebar_icon.png') 0 0 no-repeat;
        width: 26px;
        height: 80px;
        cursor:pointer;
    }

    .user{
        position: relative;
        padding: 10px 0px;
        left: 87px;
    }

    .lgout{
        display: inline-block;
        padding: 0.3em 1.2em;
        margin: 0 0.1em 0.1em 0;
        border: 0.16em solid rgba(255,255,255,0);
        border-radius: 2em;
        box-sizing: border-box;
        text-decoration: none;
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
        text-shadow: 0 0.04em 0.04em rgba(0, 0, 0, 0.35);
        text-align: center;
        transition: all 0.2s;
        /*background-color: #9a4ef1*/
        background: linear-gradient(to left,#ff7f72,#ff6d5e);
        cursor: pointer;
        position: relative;
        top: 360px;
        left: 80px;
        width: 100px;
        height: 40px;
    }

    .lgout:hover{
        border-color: rgba(255, 255, 255, 1);
    }

    .lgout a{
        text-decoration: none;
        color: #FFFFFF;

    }

    .username{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }

    .username a{
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        font-weight: none;

    }

</style>
<script language="JavaScript">
    var pee = -260
    var drec = 20;
    var speed = 20;
    var l = pee;
    //close
    function Proj7GlideBack() {
        l += drec;
        document.getElementById('menuBar').style.left = l + 'px';
        if (l < 0){
            setTimeout('Proj7GlideBack()', speed);
        } else {
            document.getElementById('glidetextLink').onclick = moveIn;
        }
    }

    //open
    function Proj7GlideOut() {
        l -= drec;
        document.getElementById('menuBar').style.left = l + 'px';
        if (l > pee){
            setTimeout('Proj7GlideOut()', speed);
        } else {
            document.getElementById('glidetextLink').onclick = moveOut;
        }
    }

    function moveIn() {
        Proj7GlideOut();
        return false;
    }

    function moveOut() {
        Proj7GlideBack();
        return false;
    }

    // if (document.layers) {
    //     origWidth = innerWidth;
    //     origHeight = innerHeight;
    // }

    // function reDo() {
    //     if (innerWidth != origWidth || innerHeight != origHeight){
    //         location.reload();
    //     }
    // }

    // if (document.layers){
    //     onresize = reDo;
    // }
        
</script>
<div ID="menuBar" style="">
    <div style="width:260px; height:600px;background: antiquewhite">
        <img class="user" src="assets/img/icons8-user-menu-male-96.png">
        <div class="username">
            <?php $user = $this->session->userdata('username'); echo $user?>
            <br>
            <a class="update" href="edit">update profile</a>
        </div>
        
        <?php if($this->session->userdata('logged_in')) : ?>
            <button class="lgout" type="button"><a href="<?php echo base_url(); ?>login/logout">Logout</a></button>
           <?php endif; ?>
    </div>
    <span ID="glider" style="">
           <div id="glidetextLink" href="javascript:;" class="glideText"
                onClick="Proj7GlideBack(); return false" onFocus="if(this.blur)this.blur()">
           </div>
    </span>
</div>
</body>
</html>