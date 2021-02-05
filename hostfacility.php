<?php
include('scripts/config.php');
if(isset($_POST['submitfacility']))
 {
$hallname=$_POST['hallname'];
$sport=$_POST['sport'];
$capacity=$_POST['capacity'];
$city=$_POST['city'];
$price=$_POST['price'];

$sql="insert into dbhall(hallname, sport, capacity, city, price) VALUES(:hallname,:sport,:capacity,:city,:price)";
$query = $dbh->prepare($sql);
$query->bindParam(':hallname',$hallname,PDO::PARAM_STR);
$query->bindParam(':sport',$sport,PDO::PARAM_STR);
$query->bindParam(':capacity',$city,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId) {
echo "<script>alert('Added new facility');</script>";
}
else
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>cardio | profile</title>
  <!-- Style -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/fonts/icomoon/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
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
		<h3>Add new <strong>facility</strong></h3>
		<form method="post">
		   <div class="form-group">
			  <label class="control-label">Facility name</label>
			  <input class="form-control white_bg" name="hallname" value="" id="hallname" type="text"  required>
		   </div>
		   <div class="form-group select">
			  <select class="form-control" name="sport">
				 <option>Select sport</option>
<?php $sql = "SELECT * from  dbsport order by sportname ASC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?>
				 <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->sportname);?></option>
				 <?php }} ?>
			  </select>
		   </div>
		   <div class="form-group">
			  <label class="control-label">Capacity</label>
			  <input class="form-control white_bg" name="capacity" id="capacity" value="" type="number"  required>
		   </div>
		   <div class="form-group">
			  <label class="control-label">City</label>
			  <input class="form-control white_bg" value="" name="city" id="city" type="text" required>
		   </div>
		   <div class="form-group">
			  <label class="control-label">Price</label>
			  <input class="form-control white_bg" name="price" value="" id="price" type="number" required>
		   </div>
		   <?php if($_SESSION['login'])
			  {?>
		   <div class="form-group">
			  <button type="submitfacility" name="submitfacility" class="btn text-white btn-block btn-primary">Add facility <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
		   </div>
		   <?php } else { ?>
		   <a href="login.php" class="btn text-white btn-block btn-primary" data-toggle="modal" data-dismiss="modal">Login to host</a>
		   <?php } ?>
		</form>
	 </div>
  </div>
</section>
</body>