<?php
include('scripts/config.php');
if(strlen($_SESSION['login'])==0)
{
header('location:index.php');
}
else{
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>cardio | my activities</title>
<!-- Style -->
<link 
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
<?php include('assets/header.php');?>
<section class="pt-3 mt-3">
 <div class="container pt-5 mt-5">
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
	   <div class="col">
		  <h3 class="py-3">My <strong>activities</strong></h3>
<?php
$useremail=$_SESSION['login'];
$sql = "SELECT dbactivities.image as image,dbactivities.activitydate, dbactivities.city, dbactivities.facility, dbactivities.activityname,dbactivities.id as aid,dbsport.sportname,dbbookingactivities.message,dbbookingactivities.status from dbbookingactivities join dbactivities on dbbookingactivities.activityid=dbactivities.id join dbsport on dbsport.id=dbactivities.sport where dbbookingactivities.userEmail=:useremail";
$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
		  <ul class="list-unstyled">
			 <li class="media">
				<a href="activity-details.php?aid="<?php echo htmlentities($result->aid);?>"">
				<img class="mr-3" width="250" src="assets/img/<?php echo htmlentities($result->image);?>" alt="image"></a>
				<div>
				   <h6><a href="activity-details.php?aid="<?php echo htmlentities($result->aid);?>""> <?php echo htmlentities($result->activityname);?></a></h6>
				   <p><b>Date:</b> <?php echo htmlentities($result->activitydate);?>
					  <br /> <b>City:</b> <?php echo htmlentities($result->city);?>
					  <br /> <b>Facility:</b> <?php echo htmlentities($result->facility);?>
				   </p>
				   <?php if($result->Status==1)
					  { ?>
				   <p <a href="#" class="btn btn-outline-primary">Confirmed</a>></p>
				   <?php } else if($result->Status==2) { ?>
				   <p class="status"> <a href="#" class="btn btn-outline-danger">Cancelled</a>></p>
				   <?php } else { ?>
				   <p class="status"> <a href="#" class="btn btn-outline-info">Not confirmed</a></p>
				   <?php } ?>
				   <p><b>Message:</b> <?php echo htmlentities($result->message);?> </p>
				</div>
			 </li>
			 <?php }} ?>
		  </ul>
	   </div>
	</div>
 </div>
</section>
</body>
</html>
<?php } ?>