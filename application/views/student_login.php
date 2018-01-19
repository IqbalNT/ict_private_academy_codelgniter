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

<!-- <title>Welcome</title>
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
			  <h2>STUDENT LOGIN</h2>
			  <form style="font-size: 30px;margin-right: 275px;text-align: center;margin-left: 265px;" action="#">
			    <div class="form-group">
			      <label for="username">Username:</label>
			      <input type="text" class="form-control" id="username" placeholder="Enter Your username" name="username">
			    </div>
			    <div class="form-group">
			      <label for="pwd">Password:</label>
			      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
			    </div>
			    <div>
			     <button type="submit" class="btn btn-primary btn-lg">Submit</button>
				</div>
			  </form>

			</div>

	</div>


</body>

</html>