<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- 
<?php
				  $images = $this->db->get('uploadfile')->result_array();
				  foreach($images as $row) ?>

				  <img src="<?php echo base_url().$row['image_url'];?>" class="img" alt="" />

			 	<? php endforeach;?> 


 -->


 



		<h2>All Lecture of You</h2>
		<table class="table">
			<thead>
			<tr>
				
					<th>Lecture No </th>
					<th>Lecture </th>
					<th> Action </th>
				
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($res as $key ) {?>
			<tr>
					<th><?=$key->alt?></th> 
					<td>
					<object data="<?=$key->image_url?>" width="30%" height="100px">
				    <iframe src="https://docs.google.com/viewer?url=<?=$key->image_url?>&embedded=true" width="50%" height="200px"></iframe>

				</object>
				</td>
					<td><a href="<?=$key->image_url?>" target="_blank" class="btn btn-success">Download</a>
					 <!-- <a href="<?php echo base_url()?>welcome/update_tutor_course">Update ||</a> -->
					 	<a href="<?=base_url()?>delete/tutor_lecture/<?=$key->lid?>" class="btn btn-danger">Delete</a></td>

				
			</tr>
 
			<?php } ?>
			</tbody>
		</table>