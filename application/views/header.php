<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="en">
<head>

  <style type="text/css">
  body{
    background-image: url('design/images/img1.png');
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
      <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li  class="last-inline"><a href="<?php echo site_url('welcome/home')?>"><span class="glyphicon glyphicon-home">Home</span></a></li>
        <li><a href="<?php echo base_url()?>about">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Sign Up<span class="caret"></span></a></a>
          <ul class="dropdown-menu">
            <li class="active"><a href="<?php echo site_url('welcome/tutor_registration')?>"> Tutor</a></li>
            <li class="active"><a href="<?php echo site_url('welcome/student_registration')?>">Student</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login<span class="caret"></span></a></a>
          <ul class="dropdown-menu">
            <li class="active"><a href="<?php echo site_url('welcome/tutor_login')?>">Tutor</a></li>
            <li class="active"><a href="<?php echo site_url('welcome/student_login')?>">Student</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
