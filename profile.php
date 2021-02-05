<?php
include('scripts/config.php');
error_reporting(0);
if(isset($_POST['updateprofile']))
 {
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$mobile=$_POST['mobile'];
$email=$_SESSION['login'];
$sql="update dbusers set firstname=:firstname, lastname=:lastname, mobile=:mobile where email=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
$query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
}

?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>cardio | profile</title>
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
<!-- Header -->
<?php include('assets/header.php');?>
<section class="pt-3 mt-3">
<div class="container pt-5 mt-5">
<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from dbusers where email=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<div class="row">
 <div class="col-3">
	<a href="profile.php">
	   <h6 class="bg-dark text-white py-3 text-center">Change Profile</h6>
	</a>
	<a href="my-booking.php">
	   <h6 class="bg-dark text-white py-3 text-center">My Bookings</h6>
	</a>
	<a href="my-activites.php">
	   <h6 class="bg-dark text-white py-3 text-center">My Activities</h6>
	</a>
	<a href="hostfacility.php">
	   <h6 class="bg-dark text-white py-3 text-center">Host facility</h6>
	</a>
	<a href="hostactivity.php">
	   <h6 class="bg-dark text-white py-3 text-center">Host activity</h6>
	</a>
 </div>
 <div class="col-8">
	<div class="py-3">
	   <h3>Account <strong>details</strong></h3>
	</div>
	<div>
	   <p>First name: <strong> <?php echo htmlentities($result->firstname);?></strong></p>
	   <p>Last name: <strong> <?php echo htmlentities($result->lastname);?></strong></p>
	</div>
	<h3>Change <strong>details</strong></h3>
	<form method="post">
	   <div class="form-group">
		  <label class="control-label">First Name</label>
		  <input class="form-control white_bg" name="firstname" value="<?php echo htmlentities($result->firstname);?>" id="firstname" type="text"  required>
	   </div>
	   <div class="form-group">
		  <label class="control-label">Last Name</label>
		  <input class="form-control white_bg" value="<?php echo htmlentities($result->lastname);?>" name="lastname" id="lastname" type="lastname" required>
	   </div>
	   <div class="form-group">
		  <label class="control-label">Mobile Number</label>
		  <input class="form-control white_bg" name="mobile" value="<?php echo htmlentities($result->mobile);?>" id="mobile" type="text" required>
	   </div>
	   <div class="form-group">
		  <button type="submit" name="updateprofile" class="btn text-white btn-block btn-primary">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
	   </div>
	</form>
 </div>
 <?php }} ?>
</div>
</body>