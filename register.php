<?php
include ('scripts/config.php');
include ('scripts/signup.php');
?>
<script>
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>cardio app | sign up</title>
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
				   <h3> Sign up to <strong>cardio</strong></h3>
				   <p class="mb-4">Booking facilities made easy</p>
				</div>
				<?php echo $success_msg; ?>
				<?php echo $error_msg; ?>
				<form  method="post" name="signup" onSubmit="return valid();">
				   <div class="form-group">
					  <label for="firstname">First Name</label>
					  <input type="text" class="form-control" name="firstname" id="firstname" required="required">
				   </div>
				   <div class="form-group">
					  <label for="lastname">Last Name</label>
					  <input type="text" class="form-control" name="lastname" id="lastname" required="required">
				   </div>
				   <div class="form-group">
					  <label for="mobile">Mobile</label>
					  <input type="text" class="form-control" name="mobile" id="mobile" maxlength="10" required="required">
				   </div>
				   <div class="form-group">
					  <label for="email">Email</label>
					  <input type="email" class="form-control" name="email" id="email" required="required">
					  <span id="user-availability-status" style="font-size:12px;"></span> 
				   </div>
				   <?php echo $email_exist; ?>
				   <div class="form-group">
					  <label for="password">Password</label>
					  <input type="password" class="form-control" name="password" id="password" required="required">
				   </div>
				   <div class="form-group">
					  <label for="confirmpassword">Confirm password</label>
					  <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required="required">
				   </div>
				   <div class="d-flex mb-5 align-items-center">
					  Already have an account?
					  <span class="ml-auto"><a href="login.php" class="create-acc">Sign in here</a></span>
				   </div>
				   <input type="submit" value="Sign Up" name="signup" class="btn text-white btn-block btn-primary">
				</form>
			 </div>
		  </div>
	   </div>
	</div>
 </div>
</div>
</body>
</html>