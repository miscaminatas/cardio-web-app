<?php
include('scripts/config.php');
if(isset($_POST['submitactivity']))
{
$message=$_POST['message'];
$useremail=$_SESSION['login'];
$status=0;
$aid=$_GET['aid'];
$sql="INSERT INTO dbbookingactivities(useremail,activityid,message,status) VALUES(:useremail,:aid,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
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
<title>cardio | activity details</title>
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
<?php include('assets/header.php');?>

<?php
//zbieranie aktywności
$aid=intval($_GET['aid']);
$sql = "SELECT dbactivities.*,dbsport.sportname,dbsport.id as sid from dbactivities join dbsport on dbsport.id=dbactivities.sport where dbactivities.id=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
$_SESSION['sportid']=$result->sid;
?>

<section>
	<div class="container">
			<div class="pt-5 py-5">
			</div>
				<div><img class="img-fluid mx-auto d-block" src="/assets/img/<?php echo htmlentities($result->image); ?>" alt="Responsive image"></div>
				<h3 class="pt-5 font-weight-bold"><?php echo htmlentities($result->activityname);?></h3>
		<div class="features pt-3">
			<div class="row py-2">
			
				<div class="col-sm border-right">
				  <p class="text-dark mb-0 py-1 small"><span class="text-muted mr-2"><i class="fas fa-biking"></i>  Sport: </span></p>
				  <?php echo htmlentities($result->sportname);?>
				</div>
				
				<div class="col-sm border-right">
<?php 
//Sprawdzanie ilości zarezerwowanych miejsc
$sql = "SELECT activityid from dbbookingactivities";
$query = $dbh -> prepare($sql);
$query->bindParam(':baid',$baid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
				  <p class="text-dark mb-0 py-1 small text-muted mr-2"><i class="fas fa-user"></i>  Capacity: </p>
				  <?php echo htmlentities($cnt);?> / <?php echo htmlentities($result->userlimit);?>
				</div>
				
				<div class="col-sm">
				  <p class="text-dark mb-0 py-1 small text-muted mr-2"><i class="fas fa-biking"></i>  City: </p>
				  <?php echo htmlentities($result->city);?>
				</div>
			</div>
			<div class="row py-2">
				<div class="col-sm">
				<p class="text-dark mb-0 py-1 small text-muted mr-2"><i class="fas fa-money-bill-wave-alt"></i>  Price: </p>
				<?php echo htmlentities($result->price);?>$ per person
				</div>
				<div class="col-sm">
				<p class="text-dark mb-0 py-1 small text-muted mr-2"><i class="fas fa-calendar-alt"></i>  Activity date: </p>
				<?php echo htmlentities($result->activitydate);?>
				</div>
				<div class="col-sm">
				<p class="text-dark mb-0 py-1 small text-muted mr-2"><i class="fas fa-building"></i>  Facility: </p>
				<?php echo htmlentities($result->facility);?>
				</div>
			<?php }} ?>
		</div>
				<!-- Bookowanie -->
			<div class="row">
				<div class="col-3">
					<div class="pt-5 pb-1">
					<h5><i class="fa fa-envelope" aria-hidden="true"></i> Book Now</h5>
					</div>
					<form method="post">
					<div class="form-group">
					<textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
					</div>
					<?php if($_SESSION['login'])
					{?>

					<div class="form-group">
					<button type="submit" class="btn text-white btn-block btn-primary" name="submitactivity">Book now</button>
					</div>
					<?php } else { ?>
					<a href="login.php" class="btn text-white btn-block btn-primary" data-toggle="modal" data-dismiss="modal">Login to book</a>

					<?php } ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('assets/footer.php');?>
</body>

</html>
