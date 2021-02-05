<?php 
include('scripts/config.php');
error_reporting(0);

?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>cardio | home</title>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<!-- Header -->
<?php include('assets/header.php');?>
<div name="navbarspace" class="py-4 my-5">
</div>
<!-- hero page -->
<div class="container py-2">
 <div class="row">
	<div class="col-md-6 order-md-2">
	   <img src="assets/img/hero.svg" alt="image" class="img-fluid">
	</div>
	<div class="col-md-6 contents">
	   <div class="row justify-content-center ">
		  <div class="hero col-md-8">
			 <div class="mb-4 py-5 mt-5">
				<h1><strong>Start working out</strong></h1>
				<p class="mb-4">We will take care of everything you need to start a healthy lifestyle</p>
			 </div>
		  </div>
	   </div>
	</div>
 </div>
</div>
<!-- Główna zawartość strony -->
<div class="container">
 <!-- Ostatnio dodane obiekty sportowe -->
 <h3 class="py-4 mt-5">Recently added <strong>activities</strong></h3>
 <div class="row justify-content-md-center">
<?php $sql = "SELECT dbactivities.*,dbsport.sportname,dbsport.id as sid from dbactivities join dbsport on dbsport.id=dbactivities.sport order by id desc limit 4";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
	<div class="col-3 rounded mx-3 pt-2">
	   <a href="activity-details.php?aid=<?php echo htmlentities($result->id);?>"><img class="rounded img-fluid" width="250" height="150" src="assets/img/<?php echo htmlentities($result->image);?>"/></a>
	   <a class="font-weight-bold text-dark" href="activity-details.php?aid=<?php echo htmlentities($result->id);?>">
		  <h2 class="pt-3"><?php echo htmlentities($result->activityname);?>
	   </a>
	   </h2>
	   <p class="text-dark small">
		  <span class="pr-3 text-muted"><i class="fas fa-map-marker-alt"></i>   City: <?php echo htmlentities($result->city);?> </span>
		  <span class="text-muted"><i class="fas fa-biking"></i>   Sport: <?php echo htmlentities($result->sportname);?></span>
	   </p>
	</div>
	<?php }} ?>
 </div>
 <!-- Ostatnio dodane aktywności sportowe -->
 <h3 class="py-4 mt-5">Recently added <strong>facilities</strong></h3>
 <div class="row justify-content-md-center">
<?php $sql = "SELECT dbhall.*,dbsport.sportname,dbsport.id as sid from dbhall join dbsport on dbsport.id=dbhall.sport order by id desc limit 3";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
	<div class="col-3 rounded mx-3 pt-2 mb-5">
	   <a href="hall-details.php?hid=<?php echo htmlentities($result->id);?>"><img class="rounded img-fluid" src="assets/img/<?php echo htmlentities($result->image);?>"/></a>
	   <a class="font-weight-bold text-dark" href="hall-details.php?hid=<?php echo htmlentities($result->id);?>">
		  <h2 class="pt-3"><?php echo htmlentities($result->hallname);?>
	   </a>
	   </h2>
	   <p class="text-dark small">
		  <span class="pr-3 text-muted"><i class="fas fa-map-marker-alt"></i>   City: <?php echo htmlentities($result->city);?> </span>
		  <span class="text-muted"><i class="fas fa-biking"></i>   Sport: <?php echo htmlentities($result->sportname);?>  </span>
	   </p>
	</div>
	<?php }} ?>
 </div>
</div>
<!-- Kontener why cardio-->
<div class="container-fluid bg-dark my-2 py-2">
 <div class="container text-white justify-content-md-center">
	<h1 class="my-5">Why <strong>cardio</strong></h1>
	<div class="row my-2 py-2 d-flex align-items-center" align="center">
	   <div class="col-3 ml-4" align="center">
		  <img src="assets/img/time.svg"/>
	   </div>
	   <div class="col-8 h-100">
		  <h3 class="font-weight-bold">Stop wasting your time</h3>
		  <p class="font-weight-bold text-light">With cardio you can easily book sport facilities or sign up for activites</br> all around Poland without having to call or meet anyone.</p>
	   </div>
	</div>
	<div class="row my-2 py-2 d-flex align-items-center" align="center">
	   <div class="col-8">
		  <h4 class="font-weight-bold">Huge selection</h4>
		  <p class="font-weight-bold text-light">Thanks to our great team we were able to bring out a lot of facilities and</br> activities for your better experience.</p>
	   </div>
	   <div class="col-3 ml-4" align="center">
		  <img src="assets/img/list.svg"/>
	   </div>
	</div>
	<div class="row my-2 py-2 d-flex align-items-center" align="center">
	   <div class="col-3 ml-4" align="center">
		  <img src="assets/img/calendar.svg"/>
	   </div>
	   <div class="col-8">
		  <h4 class="font-weight-bold">Plan ahead</h4>
		  <p class="font-weight-bold text-light">Cardio allows you to plan your activities up to a year. </br>We want to bring possibly best expierence to our customers</p>
	   </div>
	</div>
 </div>
</div>
<!-- footer -->
<?php include('assets/footer.php');?>
</body>
</html>