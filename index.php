<?php 

	session_start(); 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Line Notify</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<h1>Line Notify</h1>
		<hr>
		<form action="sendinfo.php" method="POST">
			<?php if (isset($_SESSION['success'])) {  ?>
				<div class="alert alert-success" role="alert">
				  <?php 
				  	echo $_SESSION['success']; 
				  	unset($_SESSION['success']);
				  ?>
				</div>
			<?php } ?>

			<?php if (isset($_SESSION['error'])) {  ?>
				<div class="alert alert-danger" role="alert">
				  <?php 
				  	echo $_SESSION['error']; 
				  	unset($_SESSION['error']);
				  ?>
				</div>
			<?php } ?>
		  <div class="mb-3">
		    <label for="email" class="form-label">Email address</label>
		    <input type="email" class="form-control" name="email" aria-describedby="email">
		  </div>
		  <div class="mb-3">
		    <label for="name" class="form-label">Full Name</label>
		    <input type="text" class="form-control" name="fullname" aria-describedby="fullname">
		  </div>
		  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

</body>
</html>