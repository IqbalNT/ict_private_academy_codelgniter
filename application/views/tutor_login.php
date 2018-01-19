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
<!--   <title>Welcome</title>
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
			  <h2>TUTOR LOGIN</h2>
			  <?php $this->load->library('form_validation');?>
			  <?php echo validation_errors(); 
			  $this->load->helper('form');
			  $error = $this->session->flashdata('error');
			  if($error){?>
	<div class="alert alert-danger alert-dismissable" style="margin-left:400px;margin-right:400px; ">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<?php echo $this->session->flashdata('error'); ?>
</div>
<?php }?>

			  <form style="font-size: 30px;margin-right: 275px;text-align: center;margin-left: 265px;" action="<?=base_url()?>tutor/tutor_info" method="POST">
			    <div class="form-group">
			      <label for="username">Username:</label>
			      <input type="text" class="form-control" placeholder="Enter Your username" name="username">
			    </div>
			    <div class="form-group">
			      <label for="pwd">Password:</label>
			      <input type="password" class="form-control" placeholder="Enter password" name="pwd">
			    </div>
			    <div>
			     <button type="submit" class="btn btn-primary btn-lg">Submit</button>
				</div>
			  </form>

			</div>

	</div>


</body>

</html>