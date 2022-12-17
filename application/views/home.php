<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>FunVid</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0:
        }

        body,html{
            height:100%;
        }

        .bg{
            background-image: url('assets/img/index.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100%;
            width: 100%;
        }

        .nav{
            background-color: #A5F14E;
            height:60px;
            display: flex;
            flex-direction: row;
            position: sticky;
            top: 0;
        }

        a.btn{
            display: inline-block;
            padding: 0.3em 1.2em;
            margin: 0 0.1em 0.1em 0;
            border: 0.16em solid rgba(255,255,255,0);
            border-radius: 2em;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
            font-weight: 300;
            color: #FFFFFF;
            text-shadow: 0 0.04em 0.04em rgba(0, 0, 0, 0.35);
            text-align: center;
            transition: all 0.2s;
            background-color: #9a4ef1;

        }

        a.reg-btn{
            display: inline-block;
            padding: 0.3em 1.2em;
            margin: 0 0.1em 0.1em 0;
            border: 0.16em solid rgba(255,255,255,0);
            border-radius: 2em;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
            font-weight: 300;
            color: #FFFFFF;
            text-shadow: 0 0.04em 0.04em rgba(0, 0, 0, 0.35);
            text-align: center;
            transition: all 0.2s;
            background-color: #F19A4E;
        }

        a.btn:hover, .reg-btn:hover{
            border-color: rgba(255, 255, 255, 1);
        }

        @media all and (max-width:30em){
            a.btn{
                display: block;
                margin: 0.2em auto;
            }
        }

        .logo{
            padding-left: 40px;
            line-height: 40px;
            color: purple;
            text-decoration: none;
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 20px;
            line-height: 60px;
            letter-spacing: 0.02em;
            text-transform: uppercase;
            text-shadow: 0 0 0.15em #1da9cc;
        }

        .btncontainer{
            display: flex;
            flex-grow: 1;
            align-items: center;
            float: right;
            justify-content: flex-end;
        }


        
        
    </style>
</head>
<body>
<div class="nav">
     <div class="lgcontainer">
        <a href="home" class="logo">FunVid: Share Your Videos</a>
     </div>

     <div class="btncontainer">
        <a href="register" class="reg-btn">Register</a>
        <a href="login" class="btn">Login</a>
     </div>
</div>
<div class="bg">
    <!-- <img src="assets/img/index.jpg"> -->
</div>


</body>
</html>