<?php
include ('scripts/config.php');
include ('scripts/signin.php');
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>cardio | login</title>
<!-- Style -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/fonts/icomoon/style.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link href="assets/css/fontawesome.css" rel="stylesheet">
<link href="assets/css/brands.css" rel="stylesheet">
<link href="assets/css/solid.css" rel="stylesheet">
<!-- Scripts -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</head>
<body>
  <div class="content">
	 <div class="container">
		<div class="row">
		   <div class="col-md-6 order-md-2">
			  <img src="assets/img/signupimage.svg" alt="image" class="img-fluid">
		   </div>
		   <div class="col-md-6 contents">
			  <div class="row justify-content-center">
				 <div class="col-md-8">
					<div class="mb-4">
					   <h3> Sign in to <strong>cardio</strong></h3>
					   <p class="mb-4">Booking facilities made easy</p>
					</div>
					<form method="post">
					   <div class="form-group first">
						  <label for="email">Email address</label>
						  <input type="email" class="form-control" name="email" id="email">
					   </div>
					   <div class="form-group last mb-4">
						  <label for="password">Password</label>
						  <input type="password" class="form-control" name="password" id="password">
					   </div>
					   <div class="d-flex mb-5 align-items-center">
						  Don't have an account?
						  <span class="ml-auto"><a href="register.php" class="create-acc">Sign up here</a></span>
					   </div>
					   <input type="submit" name="login" value="Login" class="btn text-white btn-block btn-primary">
					</form>
				 </div>
			  </div>
		   </div>
		</div>
	 </div>
  </div>
</body>
</html>