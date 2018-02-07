<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
	body{
		background-image: url('../../design/images/img1.png');
 /*   background-image: url('../../design/images/img1.png');*/
  }
	.tutor_reg{
		background: #99A3A4;
		text-align: center;
		font: 25px;

	}
	.tutor_reg h5{
		background: #99A3A4;
		font: 25px;
		font-size: 30px;
		padding-top: 10px;
	}
	
	</style>
	<title><?php echo $a; ?></title>
<!-- 	<title>Welcome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   -->
  </head>
  <body>

	<div class="tutor_reg">
			<div class="container">
			  <h2>STUDENT PROFILE </h2>

 <?php $this->load->library('form_validation');?>
<?php echo validation_errors(); ?>
<?php
$this->load->helper('form');
$success = $this->session->flashdata('success');
$error = $this->session->flashdata('error');
if($error){?>
	<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<?php echo $this->session->flashdata('error'); ?>                    
</div>
<?php }if($success){?>
	<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<?php echo $this->session->flashdata('success'); ?>
</div>
<?php }
?>
			  <form style="font-size: 30px;margin-right: 275px;text-align: center;margin-left: 265px;" action="<?=base_url()?>update_student_profile" method="POST">
			  	<div class="form-group">
			      <label for="name">Name:</label>
			      <input type="text" class="form-control" value="<?php echo $this->session->userdata('name');?>" name="name">
			    </div>
			    <div class="form-group">
			      <label for="username">UserName:</label>
			      <input type="text" class="form-control" value="<?php echo $this->session->userdata('username');?>" name="username">
			    </div>
			    <div class="form-group">
			      <label for="pwd">Password:</label>
			      <input type="password" class="form-control"  value="<?php echo $this->session->userdata('password');?>" name="pwd">
			    

			<!--     	<label for="gender">Gender:</label> -->
			    </div>
			    <div class="form-group" style="margin-left: 378px;" >
			    	<select class="form-control" name="gender" >
		    <option <?php if($this->session->userdata('gender')=='Male') echo 'selected';?>>Male</option>
		    <option <?php if($this->session->userdata('gender')=='Female') echo 'selected';?>>Female</option>
		    <option <?php if($this->session->userdata('gender')=='Other') echo 'selected';?>>Other</option>
			    	</select>
			    	</div>

			    <button type="submit" class="btn btn-primary btn-lg">Update</button>
			   
			  </form>
	</div>
</div>



</body>

</html>