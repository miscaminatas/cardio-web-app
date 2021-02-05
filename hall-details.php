<?php
include('scripts/config.php');
if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$message=$_POST['message'];
$useremail=$_SESSION['login'];
$status=0;
$hid=$_GET['hid'];
$sql="INSERT INTO  dbbooking(useremail,hallid,fromdate,todate,message,status) VALUES(:useremail,:hid,:fromdate,:todate,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':hid',$hid,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
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

if(isset($_POST['submitcomment']))
{
$message=$_POST['message'];
$rating=$_POST['rating'];
$useremail=$_SESSION['login'];
$status=0;
$hid=$_GET['hid'];
$sql="INSERT INTO  dbcomments(useremail,hallid,message,rating) VALUES(:useremail,:hid,:message,:rating)";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':hid',$hid,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':rating',$rating,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Comment posted.');</script>";
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
<title>cardio | hall details</title>
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
$hid=intval($_GET['hid']);
$sql = "SELECT dbhall.*,dbsport.sportname,dbsport.id as sid from dbhall join dbsport on dbsport.id=dbhall.sport where dbhall.id=:hid";
$query = $dbh -> prepare($sql);
$query->bindParam(':hid',$hid, PDO::PARAM_STR);
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
	 <div class= "container">
		<div class="pt-5">
		   <div class="py-5">
		   </div>
		</div>
		<div><img class="img-fluid mx-auto d-block" src="/assets/img/<?php echo htmlentities($result->image); ?>" alt="Responsive image"></div>
		<h3 class="pt-5 font-weight-bold"><?php echo htmlentities($result->hallname);?></h3>
		<div class="features pt-3">
		   <div class="row py-2">
			  <div class="col-sm border-right">
				 <p class="text-dark mb-0 py-1 small"><span class="text-muted mr-2"><i class="fas fa-biking"></i>  Sport: </span></p>
				 <?php echo htmlentities($result->sportname);?>
			  </div>
			  <div class="col-sm border-right">
				 <p class="text-dark mb-0 py-1 small"><span class="text-muted mr-2"><i class="fas fa-user"></i>  Capacity: </span></p>
				 <?php echo htmlentities($result->capacity);?>
			  </div>
			  <div class="col-sm">
				 <p class="text-dark mb-0 py-1 small"><span class="text-muted mr-2"><i class="fas fa-biking"></i>  City: </span></p>
				 <?php echo htmlentities($result->city);?>
			  </div>
		   </div>
		   <div class="row py-2">
			  <div class="col-sm">
				 <p class="text-dark mb-0 py-1 small"><span class="text-muted mr-2"><i class="fas fa-money-bill-wave-alt"></i>  Price: </span></p>
				 <?php echo htmlentities($result->price);?>$ / per day
			  </div>
			  <?php }} ?>
		   </div>
		   <!-- Bookowanie -->
		   <div class="row">
			  <div class="col-3">
				 <div class=" pt-5 pb-1">
					<h5><i class="fa fa-envelope" aria-hidden="true"></i> Book</h5>
				 </div>
				 <form method="post">
					<div class="form-group">
					   <input type="text" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
					</div>
					<div class="form-group">
					   <input type="text" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
					</div>
					<div class="form-group">
					   <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
					</div>
					<?php if($_SESSION['login'])
					   {?>
					<div class="form-group">
					   <button type="submit" class="btn text-white btn-block btn-primary" name="submit">Book now</button>
					</div>
					<?php } else { ?>
					<a href="login.php" class="btn text-white btn-block btn-primary" data-toggle="modal" data-dismiss="modal">Login to book</a>
					<?php } ?>
				 </form>
			  </div>
			  <!--Formularz komentowania-->
			  <div class="col-8">
				 <div class="header pt-5 pb-1">
					<h5><i class="fa fa-comments" aria-hidden="true"></i> Post coment</h5>
				 </div>
				 <form method="post">
					<div class="form-group">
					   <input type="number" class="form-control" name="rating" placeholder="Rating from 1 to 5" min="1" max="5" required>
					</div>
					<div class="form-group">
					   <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
					</div>
					<?php if($_SESSION['login'])
					   {?>
					<div class="form-group">
					   <input type="submit" class="btn text-white btn-block btn-primary"  name="submitcomment" value="Post your comment">
					</div>
					<?php } else { ?>
					<a href="login.php" class="btn text-white btn-block btn-primary" data-toggle="modal" data-dismiss="modal">Login to comment</a>
					<?php } ?>
				 </form>
<!--Zbieranie komentarzy-->
<?php 
$hid=intval($_GET['hid']);
$sql = $sql = "SELECT dbhall.id as hid,dbcomments.useremail,dbcomments.message,dbcomments.rating from dbcomments join dbhall on dbcomments.hallid=dbhall.id where dbcomments.hallid=:hid";
$query = $dbh -> prepare($sql);
$query->bindParam(':hid',$hid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
				 <div>
					<h5><i class="fa fa-comments" aria-hidden="true"></i> Comments section</h5>
					<div class="media border-top border-bottom py-3">
					   <i class="fas fa-user fa-5x pr-5"></i>
					   <div class="media-body">
						  <small>
							 <p class="mt-0"><?php echo htmlentities($result->useremail);?>&nbsp;&nbsp;&nbsp;<i class="fas fa-star"></i>&nbsp;<?php echo htmlentities($result->rating);?> / 5</p>
						  </small>
						  <?php echo htmlentities($result->message);?>
					   </div>
					</div>
					<?php }} ?>
				 </div>
			  </div>
		   </div>
		</div>
	 </div>
</section>
<?php include('assets/footer.php');?>
</body>
</html>