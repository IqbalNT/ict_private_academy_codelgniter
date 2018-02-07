<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="en">
<head>

  <style type="text/css">
  body{
    background-image: url('../../design/images/img1.png');
  }
  </style>
  <title> <?php echo $a; ?> </title>

 <!--  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="../../ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div style="text-align:center;color: #f4f6f7;background: #70367c;height: 94px;padding-top:10px; ">
  <h1>ICT PRIVATE ACADEMY</h1>

</div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li  class="last-inline"><a href="<?php echo base_url()?>student/home_after_login"><span class="glyphicon glyphicon-home"></span>Home</a></li>
      </ul>
      <ul class="nav navbar-nav">
        <li  class="last-inline"><a href="<?php echo base_url()?>student_show_lecture">Lecture</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Profile<span class="caret"></span></a></a>
          <ul class="dropdown-menu">
            <li class="active"><a href="<?php echo base_url()?>student/update_student_profile"> Update Profile</a></li>
           <!--  <li class="active"><a href="<?php echo site_url('welcome/student_registration')?>"></a></li> -->
          </ul>
        </li>
        <li >
          <a  href="<?php echo base_url()?>student/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a><!-- </a> -->
        </li>
      </ul>
    </div>
  </div>
</nav>
<div style="width:1365px;height:70px;color: #FDFEFE;background: #F1948A;text-align:center;">
 <marquee> <h2><!--   <?php echo $notice;?>  -->   <?php
 foreach ($res as $key) {?>
 &nbsp&nbsp &nbsp&nbsp
 <?php 
   echo $key->notice;?>:<?php echo $key->name;
  }  
 ?></h2> </marquee>
</div>
</body>
</html>