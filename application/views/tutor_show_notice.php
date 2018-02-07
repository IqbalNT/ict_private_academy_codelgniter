<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

		<h2>All Notice of You</h2>
		<table class="table">
			<thead>
			<tr>
				
					<th> Notice No </th>
					<th>Notice </th>
					<th> Action </th>
				
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($res as $key ) {?>
			<tr>
				<form method="post" action="<?=base_url()?>update/tutor_notice/<?=$key->nid?>">
					<th><?php echo $key->nid;?></th>
					<td><input name='notice' value='<?php echo $key->notice; ?>' class='form-control'/></td>
					 <td><!-- <a href="<?php echo base_url()?>welcome/update_tutor_course">Update ||</a> -->
					 	<button type="submit" class="btn btn-success">Update</button>
					 	<a href="<?=base_url()?>delete/tutor_notice/<?=$key->nid?>" class="btn btn-danger">Delete</a></td>
				</form>
			</tr>
 
			<?php } ?>
			</tbody>
		</table>
