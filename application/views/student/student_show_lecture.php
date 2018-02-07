<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Display contents</title>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<link rel="stylesheet" 
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
<link rel="stylesheet" 
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" 
    type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<style type="text/css">
a:hover{
    text-decoration: none;
}

h1 {
    color: #444;
    background-color: transparent;
    border-bottom: 1px solid #D0D0D0;
    font-size: 19px;
    font-weight: normal;
    margin: 0 0 14px 0;
    padding: 14px 15px 10px 15px;
}

#container {
    margin-top: 10px;
    border: 1px solid #D0D0D0;
    box-shadow: 0 0 8px #D0D0D0;
}

p {
    margin: 12px 15px 12px 15px;
}

i {
    cursor: pointer;
    text-decoration: none;
}
</style>
</head>
<body>

<?php
if(isset($get_data) && is_array($get_data) && count($get_data)): $i=1;
foreach ($get_data as $key => $data) { 
?>
<div class="container" id="container">
    <h1><?php echo $data['alt']; ?></h1>

    <object data="<?php echo $data['image_url']; ?>" width="30%" height="100px">
				    <iframe src="https://docs.google.com/viewer?url=<?php echo $data['image_url']; ?>&embedded=true" width="50%" height="200px"></iframe>

	</object>
	<a href="<?php echo $data['image_url']; ?>" target="_blank" class="btn btn-success" style="margin-left:700px;">Download</a>
    <p><a onclick="javascript:savelike(<?php echo $data['lid'];?>);">
     <i class="fa fa-thumbs-up"></i> 
     <span id="like_<?php echo $data['lid'];?>">
        <?php if($data['likes']>0){echo $data['likes'].' Likes';}else{echo 'Like';} ?>
     </span></a>
    </p>    
</div>
<?php } endif; ?>



<script type="text/javascript">
function savelike(storyid)
{
        $.ajax({
                type: "POST",
                url: "<?php echo site_url('Student/savelikes');?>",
                data: "Storyid="+storyid,
                success: function (response) {
                 $("#like_"+storyid).html(response+" Likes");
                  
                }
            });
}
</script>


</body>
</html>