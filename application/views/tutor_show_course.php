<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

		<h2>All Courses of You</h2>
		<table class="table">
			<thead>
			<tr>
				
					<th> Course No </th>
					<th>Course Name </th>
					<th> Action </th>
				
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($res as $key ) {?>
			<tr>
				<form method="post" action="<?=base_url()?>update/tutor_course/<?=$key->cid?>">
					<th><?php echo $key->cid;?></th>
					<td><input name='course_title' value='<?php echo $key->title; ?>' class='form-control'/></td>
					 <td><!-- <a href="<?php echo base_url()?>welcome/update_tutor_course">Update ||</a> -->
					 	<button type="submit" class="btn btn-success">Update</button>
					 	<a href="<?=base_url()?>delete/tutor_course/<?=$key->cid?>" class="btn btn-danger">Delete</a></td>
				</form>
			</tr>
 
			<?php } ?>
			</tbody>
		</table>
