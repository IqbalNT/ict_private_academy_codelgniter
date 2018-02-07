<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

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
			<h2>ADD LECTURE</h2>
			<?php
			$this->load->helper('form');
			$success = $this->session->flashdata('success');
			$error = $this->session->flashdata('error');
			?>


			<?php if($success){?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<?php echo $this->session->flashdata('success'); ?>                    
			</div>
			<?php }

			elseif($error){?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<?php echo $this->session->flashdata('error'); ?>                    
			</div>
			<?php }?>


				<?php echo form_open_multipart('Lectureupload/image_upload/' , array('id' => 'img')); ?>
				  <div style="font-size: 30px;margin-right: 350px;text-align: center;margin-left: 350px;margin-bottom:5px;">
	
				  <input type="text" style="margin-bottom:10px;" class="form-control" name="alt" placeholder="Enter Lecture Number(EX: Lecture 1)" tabindex="1" required>
				  <input type="file" style="margin-bottom:10px;"class="form-control" name="pic" tabindex="2" required>
				  <button class="btn btn-primary btn-lg"type="submit" id="img-submit" data-submit="Sending">Add Lecture</button>
				  </div>
				</form>
		</div>
	</div>


</body>

</html>