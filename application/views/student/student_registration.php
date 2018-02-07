<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
	body{
    background-image: url('../../design/images/img1.png');
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
</head>
  
<body>

	<div class="tutor_reg">
			<div class="container">
			  <h2>STUDENT REGISTRATION</h2>

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
			  <form style="font-size: 30px;margin-right: 275px;text-align: center;margin-left: 265px;" action="<?=base_url()?>student_registration/register" method="POST">
			  	<div class="form-group">
			      <label for="name">Name:</label>
			      <input type="text" class="form-control" placeholder="Enter Your Name" name="name">
			    </div>
			    <div class="form-group">
			      <label for="username">Username:</label>
			      <input type="text" class="form-control" placeholder="Enter Your username" name="username">
			    </div>
			    <div class="form-group">
			      <label for="email">Email:</label>
			      <input type="email" class="form-control" placeholder="Enter Your email" name="email">
			    </div>
			    <div class="form-group">
			      <label for="pwd">Password:</label>
			      <input type="password" class="form-control"  placeholder="Enter password" name="pwd">
			    

			<!--     	<label for="gender">Gender:</label> -->
			    </div>
			    <div class="form-group" style="margin-left: 378px;" >
			    	<select class="form-control" name="gender" >
			    		<option>Male</option>
			    		<option>Female</option>
			    		<option>Other</option>
			    	</select>
			    	</div>

			    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
			   
			  </form>
	</div>
</div>



</body>

</html>